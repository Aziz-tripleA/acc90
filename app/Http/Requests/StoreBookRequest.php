<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class StoreBookRequest extends FormRequest
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
                'required',
//                Rule::unique('books')->where(function ($query) use($book) {
//                    return $query->where('type_id','=', $book->type->id);
//                }),
            ],
            // 'item_name' => [
            //     'required',
            //     Rule::unique('books')->where(function ($query) use($book) {
            //         return $query->where('type_id','!=', $book->type->id);
            //     }),
            // ],

            // 'item_code' => 'required|unique:books,item_code',
            'item_name' => 'required',
            'item_size'=> 'required',
            'item_copies'=> 'required',
            'type_id'=> 'required',
            'cat_id' => 'required',
            'author_id' => 'required',
            'publish_id' => 'required',
            'translator_id' => 'required',
            'pub_date' => 'required',
        ];
    }
}
