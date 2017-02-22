<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class UserRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize(){
        return true;
    }

    
    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules(){
        return [
            'name' => 'required|max:255',
            //'login' => 'required|max:50|unique:users,login,'.$this->id,
            //'email' => 'required|email|max:255|unique:users,email,'.$this->id,
            'password' => 'required|min:6', //'required|min:6|confirmed',
        ];
    }
    
    public function messages(){
        return [
            'required' => 'Это поле обязательно к заполнению',
            'max' => 'Максимально количество символов :max',
            'min' => 'Минимальное количество символов :min',
            'unique' => 'Значение не уникально',
            'confirmed' => 'Пароль не совпадает с подтверждением',
        ];
    }
    

    /*public function all(){
    	$this->merge( array('password'=> bcrypt( $this->request->get('password') ) ) );
        return $this->request->all();
    }*/
    
}
