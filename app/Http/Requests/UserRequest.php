<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\City;

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
            
            'login' => 'required|max:50|unique:users,login,'.$this->id,
            'email' => 'required|email|max:255|unique:users,email,'.$this->id,
            'password' => 'required|min:6|confirmed',
            'fullname' => 'required|max:255',
            'image' => 'required|max:255',
            'phone' => 'required|max:255',
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
    
    public function modifyRequest($attribute = NULL)
	{
		$city = City::where('name', $this->request->get('city'))->first();
		$this->merge( array('city_id'=> $city->id ) ) ;
		
		if($attribute) {
			return $this->request->all();
		}   
		return $this->only('fullname','city_id','phone','geolocation','image');
	}


   
}
