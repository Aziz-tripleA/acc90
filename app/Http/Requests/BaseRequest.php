<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BaseRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function getImageMaxSize()
    {
        return config('acc.sysconfig.image_max_size');
    }

    protected function isUpdate()
    {
        return in_array($this->getMethod(), ['PATCH', 'PUT']);
    }
}
