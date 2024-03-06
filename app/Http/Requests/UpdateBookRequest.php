<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $book = $this->book;
        return [
            'item_code' => [
                'sometimes','required',
                Rule::unique('books')->ignore($book->id)->where(function ($query) use($book) {
                    return $query->where('type_id','=', $book->type->id);
                }),
            ],
            // 'item_name' => [
            //     'sometimes','required',
            //     Rule::unique('books')->ignore($book->id)->where(function ($query) use($book) {
            //         return $query->where('type_id','=', $book->type->id);
            //     }),
            // ],
            'item_name' => 'sometimes|required',
            //'item_size'=> 'sometimes|required',
            //'item_copies'=> 'sometimes|required',
            'type_id'=> 'sometimes|required',
            'cat_id' => 'sometimes|required',
            'author_id' => 'sometimes|required',
            'publish_id' => 'sometimes|required',
            'translator_id' => 'sometimes|required',
            'pub_date' => 'sometimes|required',
            
        ];
    }
}
