<?php

namespace App\Observers;

//use App\Notifications\SendNotification;
use App\Models\User;

class UserObserver
{
    /**
     * Handle the order "creating" event.
     */
    public function creating(User $user)
    {
        $arr = User::getStatusFor();
        $user->status_id = $arr['status']->firstWhere('order', 1)->id;
//        $user->locale = $user->locale ?: config('app.locale');
//        $user->mobile_verification_token = app(User::class)->getRandomNumber();
       //$user->mobile_verification_token = '1234';

    }

    /**
     * Handle the user "created" event.
     *
     * @return [type] [description]
     */
    public function created(User $user)
    {
        // auto create cart
//        if (!$user->carts()->count())
//            $user->carts()->create();

        if (!app()->runningInConsole() && !$user->is_guest) {
            // notify for email verification
            if (!$user->hasVerifiedEmail()) {
                $user->sendEmailVerificationNotification();
            }
            // if (!$user->hasVerifiedMobile()) {
            //     // notify for mobile verification
            //     new SendNotification('mobile_verification', $user, [
            //         'code' => $user->mobile_verification_token
            //     ]);
            // }
        }
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(User $user)
    {

    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(User $user)
    {
        $user->update([
            'email' => 'deleted-' . time() . '-' . $user->email,
            'mobile' => 'deleted-' . time() . '-' . $user->mobile,
        ]);
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(User $user)
    {
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(User $user)
    {
    }
}
