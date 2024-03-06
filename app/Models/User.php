<?php

namespace App\Models;

use App\Models\ConfigData;
use App\Notifications\SendNotification;
use Hash;
use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Status;
use App\Models\Traits\HasMedia;
use App\Models\Traits\HasStatus;
use App\Models\Traits\HasSortings;
use App\Models\Traits\ModelCommon;
use App\Models\Traits\HasSoftDeletes;
use App\Models\Traits\Uuid;
use Illuminate\Support\Facades\URL;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Models\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Translation\HasLocalePreference;
use Spatie\MediaLibrary\HasMedia as HasMediaContract;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable implements
    JWTSubject,
    HasLocalePreference,
    HasMediaContract
{

    use Notifiable,
        HasStatus,
        HasSortings,
        HasMedia,
        ModelCommon,
        HasRoles,
        HasRelationships;


    protected $guarded = ['id', 'password_confirmation'];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['email_verified_at', 'mobile_verified_at'];

    protected static $sorting_options = [4, 2, 3];

    /**
     * fix Entrust package soft delete
     * and laravel soft delete collision.
     *
     * @return [type] [return description]
     */
    public function restore()
    {
        $this->restoreA();
        $this->restoreB();
    }

    /* ========================================================================== */
    /*                              Override defaults                             */
    /* ========================================================================== */

    /**
     * for twilio.
     */
    public function routeNotificationForTwilio()
    {
        return $this->mobile;
    }

    /**
     * for email locales.
     */
    public function preferredLocale()
    {
        return $this->locale;
    }

    /**
     * sendPasswordResetNotification.
     *
     * @param mixed $token
     */
    public function sendPasswordResetNotification($token)
    {
        if (!$this->hasRole('customer')) {
            $link = route('admin_password.reset', [
                'token' => $token,
                'email' => $this->getEmailForPasswordReset(),
            ]);
        } else {
            $link = route('link_checker', [
                'route_name' => 'password.reset',
                'token' => $token,
                'email' => $this->getEmailForPasswordReset(),
            ]);
        }
        new SendNotification('forget_password', $this, [
            'user-full-name' => $this->full_name,
            'link' => $link
        ]);
    }

    /**
     * sendEmailVerificationNotification.
     */
    public function sendEmailVerificationNotification()
    {
        $link = route('link_checker', [
            'signed' => true,
            'route_name' => 'verification.verify',
            'id' => $this->getKey(),
        ]);
        new SendNotification('email_verification', $this, [
            'user-full-name' => $this->full_name,
            'link' => $link,
        ]);
    }

    protected function verificationUrl()
    {
        return URL::signedRoute(
            'verification.verify',
            ['id' => $this->getKey()]
        );
    }


    /* ========================================================================== */
    /*                                     JWT                                    */
    /* ========================================================================== */

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /* ========================================================================== */
    /*                                  ACCESSORS                                 */
    /* ========================================================================== */

    public function getAvatarAttribute()
    {
        return $this->getFirstMedia('avatar');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getShortNameAttribute()
    {
        return "{$this->first_name}";
    }

    public function getIsActiveAttribute()
    {
        return $this->status->order == 1;
    }

    public function getIsVerifiedProviderAttribute()
    {
        return $this->provider_verification_status->order == 2;
    }


    /* ------------------------------- get currently active ------------------------------ */


    public function getActiveCartAttribute()
    {
        return $this->carts()->isOpened()->first();
    }

    /* ========================================================================== */
    /*                                  MUTATORS                                  */
    /* ========================================================================== */

    public function setPasswordAttribute($value)
    {
        if ($value) {
            $this->attributes['password'] = Hash::needsRehash($value) ? Hash::make($value) : $value;
        }
    }

    /* ========================================================================== */
    /*                                  RELATIONS                                 */
    /* ========================================================================== */



    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function cart()
    {
        return $this->hasOne(Cart::class)->isOpened()->latest();
    }

    public function orders()
    {
        return $this->hasManyThrough(Order::class, Cart::class);
    }

    public function basket()
    {
        return $this->carts()->isOpened()->first()->basket();
    }

    /* ========================================================================== */
    /*                                   HELPERS                                  */
    /* ========================================================================== */

    /* --------------------------- verification -------------------------- */

    public function hasVerifiedMobile()
    {
        return !is_null($this->mobile_verified_at);
    }

    public function markMobileAsVerified()
    {
        return $this->forceFill([
            'mobile_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function hasCompleteVerification()
    {
        return $this->hasVerifiedEmail() && $this->hasVerifiedMobile();
    }

    /* ------------------------------ roles ----------------------------- */

    public function getRoleAttribute()
    {
        return $this->roles()->first();
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isClient()
    {
        return $this->hasRole('client');
    }

    public function isCustomer()
    {
        return $this->hasRole('customer');
    }

    public function hasManagerAccess()
    {
        return !$this->hasRole('customer');
    }

    public function attachRoleOf($name)
    {
        return $this->attachRole(Role::where('name', $name)->first());
    }

    /* --------------------------------- others --------------------------------- */

    /**
     * get random token for the mobile verify.
     */
    public function getRandomNumber()
    {
//        return 1234;
        return mt_rand(1000, 9999);
    }

}
