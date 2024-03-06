<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStore;
use App\Presenters\CommonPresenter;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['show']);
    }

    /**
     * edit.
     *
     * @param int $id
     * @return Factory|View
     */
    public function edit()
    {
        $auth = auth()->user();

        return view('pages.user.profile.edit', [
            'user' => $auth,
            'locales' => LaravelLocalization::getSupportedLocales(),
        ]);
    }



    /**
     * update.
     * @bodyParam first_name string required for customer only
     * @bodyParam last_name string required for customer only
     * @bodyParam email string required
     * @bodyParam country_code string required for mobileApp only
     * @bodyParam mobile string required
     * @bodyParam current_password string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     *
     * @param mixed $id
     * @param UserStore $request
     * @return JsonResponse|RedirectResponse|Redirector
     */
    public function update($id = null, UserStore $request)
    {
        $auth = auth()->user();
        if ($id && !$auth->hasManagerAccess() && $id != $auth->id) {
            abort(403, 'This action is unauthorized.');
        }
        $user = $id ? User::find($id) : $auth;
        if($request->charity_id){
            $user->charities()->where('charity_id',$request->charity_id)->update(['default'=>1]);
            $user->charities()->where('charity_id','!=',$request->charity_id)->update(['default'=>0]);
            return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to, 'success', [
                'user' => fractal($auth->fresh(), new UserTransformer())->toArray()['data']
            ]);
        }
        $ignore = ['avatar', 'current_password','email_verified','mobile_verified','device_token'];
        $data = $request->except($ignore);
        if (!$auth->hasManagerAccess()) {
            if ($request->email && $request->email != $user->email) {
                if ($user->hasVerifiedEmail()) {
                    $data['email_verified_at'] = null;
                }
            }
            if ($request->mobile && $request->mobile != $user->mobile) {
                if ($user->hasVerifiedMobile()) {
                    $data['mobile_verified_at'] = null;
                }
            }
        } else {
            if ($request->email_verified) {
                if (!$user->hasVerifiedEmail()) {
                    $data['email_verified_at'] = now();
                }
            } else {
                $data['email_verified_at'] = null;
            }
            if ($request->mobile_verified) {
                if (!$user->hasVerifiedMobile()) {
                    $data['mobile_verified_at'] = now();
                }
            } else {
                $data['mobile_verified_at'] = null;
            }
        }
        $user->update($data);
        $this->saveToken($request,$user);
        if ($avatar = $request->avatar) {
            $user->addHashedMedia($avatar)->toMediaCollection('avatar');
        }
        if ($auth->hasManagerAccess()) {
            $url = url()->previous();
        } else {
            $url = route('user.dashboard');
        }

        return $this->returnCrudData(__('system_messages.common.update_success'), $request->redirect_to, 'success', [
            'user' => fractal($auth->fresh(), new UserTransformer())->toArray()['data']
        ]);
    }




}
