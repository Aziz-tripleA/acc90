<?php

namespace App\Http\Controllers\Auth\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserAuth;
use App\Http\Requests\UserStore;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Log;

/**
 * @group Auth
 */
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')
            ->only(['logout', 'getAuthUser', 'refresh']);
    }

    /**
     * login.
     *
     * @param Request $request [description]
     *
     * @return \Illuminate\Http\JsonResponse [type] [description]
     * @throws \Illuminate\Validation\ValidationException
     * @bodyParam email string required
     * @bodyParam password string required
     * @bodyParam device_token string
     *
     */
    public function login(Request $request)
    {
        $this->validate($request, (new UserAuth())->loginRules());
        $user = User::where('email', $request->email)->first();
        if ($user && ($user->status->order == 2)) {
            $user_status = 'inactive';
            return $this->returnCrudData(__('system_messages.auth.inactive'), null, 'error');
        }
        if($user){
            $user_status = 'user exist';
        }else{
            $user_status = 'user doesnt exist';
        }
        $credentials = $request->only('email', 'password');
        $token = auth()->attempt($credentials, true);
        try {
            if (!$token) {
                $password_status = 'password wrong';
                $log = "========================================================\n\n" . print_r([
                    'email' => $request->email,
                    'user_exists' => $user_status,
                    'user_agent' => $request->userAgent(),
                    'password' => $password_status
                ], true) . "\n\n";
                Log::channel('test')->info($log);
                return response()->json(['error' => __('system_messages.auth.failed')], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could not create token'], 500);
        }
        $authUser = auth()->user();
        $authUser->update(['last_login' => now()]);
        $log = "========================================================\n\n" . print_r($request->input(), 1) . "\n\n";
        Log::channel('test')->info($log);
        $this->saveToken($request, auth()->user());
        $this->moveGuest($authUser);
        return $this->returnCrudData(__('system_messages.auth.success'), null, 'success', [
            'user' => fractal($user->fresh(), new UserTransformer())->toArray()['data'],
            'token' => $token,
        ]);
    }

    /**
     * register.
     *
     * @bodyParam first_name string required for customer only
     * @bodyParam last_name string required for customer only
     * @bodyParam email string required
     * @bodyParam country_code string required for mobileApp only
     * @bodyParam mobile string required
     * @bodyParam password string required
     * @bodyParam password_confirmation string required
     * @bodyParam social integer [send it only if the user is with social register and send it with value = 1]
     * @bodyParam locale string [en/ar]
     * @bodyParam device_token string
     * @bodyParam promotional_offer boolean
     *
     * @param UserStore $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(UserStore $request)
    {
        $data = $request->except('avatar', 'social', 'device_token','g-recaptcha-response');
        if ($request->social) {
            $data['email_verified_at'] = now();
        }
        $user = User::create($data);
        $user->attachRoleOf('customer');
        $token = auth()->fromUser($user);
        if ($request->avatar) {
            $user->addMediaFromUrl($request->avatar)->toMediaCollection('avatar');
        }
        $this->saveToken($request, $user);
        $this->moveGuest($user);
        return $this->returnCrudData(__('system_messages.auth.register_success'), null, 'success', [
            'user' => fractal($user->fresh(), new UserTransformer())->toArray()['data'],
            'token' => $token,
        ]);
    }

    /**
     * logout.
     * @bodyParam device_token string
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector [type] [description]
     */
    public function logout(Request $request)
    {
        $auth = auth()->user();
        if ($request->device_token) {
            $tokens = $auth->device_tokens;
            if (!is_null($tokens)) {
                $pos = array_search($request->device_token, $tokens);
                if ($pos !== false) {
                    unset($tokens[$pos]);
                }
            }
            $auth->update([
                'device_tokens' => $tokens ?: null,
            ]);
        }
        auth()->logout();
        return $this->returnCrudData(__('Successfully logged out'));
    }

    /**
     * get current Authenticated User.
     *
     * @return [type] [description]
     */
    public function getAuthUser()
    {
        return $this->returnCrudData('', null, 'success',
            fractal(auth()->user(), new UserTransformer())->toArray()['data']
        );
    }

    protected function getToken($t)
    {
        return [
            'access_token' => $t,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL(),
        ];
    }
}
