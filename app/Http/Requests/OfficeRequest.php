<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\City;

class OfficeRequest extends FormRequest
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
            'fullname' => 'required|max:255',
        ];
    }
    
    public function messages(){
		return [
			'required' => 'Обязательно',
		];
	}
	
	public function all(){
		
		$city = City::where('name', $this->request->get('city'))->first();
		$this->merge( array('city_id' => $city->id ) ) ;
        return $this->request->all();
	}
	
}
