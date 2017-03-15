<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
use App\Menu;

class MenuRequest extends FormRequest
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
            'title' => 'required|max:255',
            'url' => 'required|max:255|unique:menus,url,'.$this->id,
            'weight' => 'digits:1',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Это поле обязательно к заполнению',
            'max' => 'Максимально количество символов :max',
            'unique' => 'Значение не уникально',
        ];
    }

   
    public function modifyRequest(){ // преобразуем request для сохранения данных
    
    	$menu = Menu::where('title', $this->request->get('category'))->first();
        
        $this->merge(array('weight'=>(int) $this->request->get('weight')));
        $this->merge(array('published'=>$this->request->has('published')? 1 : 0));
        $this->merge(array('is_category'=>$this->request->has('is_category')? 1 : 0));
        $this->merge(array('category'=>$menu->id));
        return $this->request->all();
    }

}