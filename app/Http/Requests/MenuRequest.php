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

    public function all(){ // преобразуем request для сохранения данных
        $input = parent::all();
        $input['weight'] = (int) $input['weight']; //weight поля из string в int
        $input['published'] = isset($input['published']) ? 1 : 0; // field published
        $input['category'] = Menu::getMenuIdByTitle($input['category']); // изменим input title категории меню на его id 
        return $input;
    }

}