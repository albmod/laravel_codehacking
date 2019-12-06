<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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

            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',

            'role_id'=>'required|not_in:Choose...',
            //
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Hay, you have to put the name that is required!',
            'email.required' => 'Ohh have to put the Email that is required too!',
            //'role_id.required' => 'You must Choose Rule  is required too, man!',
            'role_id.not_in' => 'You must Choose Rule  is required too, man!',

        ];
    }
}
