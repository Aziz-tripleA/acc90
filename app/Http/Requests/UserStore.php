<?php

namespace App\Http\Requests;

use App\Http\Requests\Traits\HasPassword;

class UserStore extends BaseRequest
{
    use HasPassword;

    public function attributes()
    {
        return [
            'categories.*' => 'categories',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array_merge($this->getPasswordRules(false), [
            'first_name' => 'sometimes|required|string',
            'last_name' => 'sometimes|required|string',
            'email' => 'required|email|max:255|unique:users', // isValid
            'mobile' => 'sometimes|required|unique:users,mobile',
            'role_id' => 'sometimes|required',
            'g-recaptcha-response'=>'sometimes|required|recaptcha'
        ]);

        if ($this->isUpdate()) {
            if ($this->route('user')) {
                $id = $this->route('user')->id;
            } elseif ($this->route('id')) {
                $id = $this->route('id');
            } else {
                $id = auth()->user()->id;
            }
                $rules = array_merge($rules, [
                    'locale' => 'sometimes|required',
                    'email' => 'sometimes|required|email|max:255|unique:users,email,' . $id, // isValid
                    'password' => 'sometimes|nullable|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9]).{8,}$/', // pwned|dumbpwd
                    'password_confirmation' => 'sometimes|nullable|same:password',
//                'mobile' => 'sometimes|required|regex:/\+\d+/i|unique:users,mobile,' . $id,
                    'mobile' => 'sometimes|required|unique:users,mobile,' . $id,
                    'avatar' => 'nullable|image|max:' . $this->getImageMaxSize(),
                ]);
        }
        return $rules;
    }
}
