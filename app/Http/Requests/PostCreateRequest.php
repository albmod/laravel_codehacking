<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PostCreateRequest extends Request
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required|not_in:Choose...',

            //
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'Hay, you have to put title for your post!',
            'body.required' => 'Ohh have to put the Content!',
            'category_id.not_in' => 'You must Choose Category  is required too, man!',

        ];
    }
}