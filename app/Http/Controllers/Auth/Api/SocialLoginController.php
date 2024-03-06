<?php

namespace App\Http\Controllers\Auth\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use Illuminate\Support\Facades\Log;

/**
 * @group Auth
 */
class SocialLoginController extends Controller
{
    /**
     * getUserBySocial.
     *
     * @bodyParam email string
     * @bodyParam device_token string
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUserBySocial(Request $request)
    {
        if ($user = User::where('email', $request->email)->first()) {
            $token = auth()->fromUser($user);
            $this->saveToken($request, $user);
            $this->moveGuest($user);
            $log = "========================================================\n\n" . print_r([
                    'email' => $request->email,
                    'user_exists' => 1,
                    'user_agent' => $request->userAgent()
                ], true) . "\n\n";
            Log::channel('social')->info($log);
            return $this->returnCrudData('Welcome Back', null, 'success', [
                'user_exists' => true,
                'user' => fractal($user, new UserTransformer())->toArray()['data'],
                'token' => $token,
            ]);
        }

        $log = "========================================================\n\n" . print_r([
                'email' => $request->email,
                'user_exists' => 0,
                'user_agent' => $request->userAgent()
            ], true) . "\n\n";
        Log::channel('social')->info($log);
        return $this->returnCrudData('Please fill missing fields', null, 'error', [
            'user_exists' => false,
        ]);
    }
}
