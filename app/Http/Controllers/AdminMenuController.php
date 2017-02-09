<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Menu;
use App\User;

class AdminMenuController extends Controller
{
	public function __construct(Menu $menu)
	{
		$this->menu = $menu;
	}
	/**
	* Display a listing of the resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function index()
	{
		$viewdata = $this->menu->all();
		return view('admin.menus')->with(['viewdata'=>$viewdata, 'title'=>'Меню']);
	}

	/**
	* Show the form for creating a new resource.
	*
	* @return \Illuminate\Http\Response
	*/
	public function create() //создаем страницу добавления записи
	{
		return view('admin.menu.create')->with([
				'title'=>'Меню',
				'parents'=>Menu::all(),
			]);
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(Request $request) //по нажатию на кнопку Create данные отправятся в метод
	{

		$messages    = [
			'title.required' => 'Поле заголовок меню обязательно к заполнению',
			'max' => 'Максимально :attribute',
		];

		$rules       = [
			'title' => 'required|max:255',
			'url' => 'required|max:255|'//unique:menus,url',
		];

		$this->validate($request, $rules, $messages);

		$requestData = $request->all();

		if(isset($requestData['published'])){
			$requestData['published'] = 1;
		}

		Menu::create($requestData);
		return redirect(route('menus.index'))->with('message','Пункт меню добавлен');
		
	}

	/**
	* Display the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function show($id) //создаем страницу просмотра записи
	{
		//
	}

	/**
	* Show the form for editing the specified resource.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function edit($id) //создаем страницу редактирования записи
	{
		$menu = Menu::find($id);
		//dd('Заголовок меню - '.$menu->title.' Родитель - '.$menu->parentRecord->title);
		return view('admin.menus_form')->with([
				'title'=>'Редактирование Меню',
				'viewdata' => $menu,
			]);
	}

	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update(Request $request, $id) //по нажатию на кнопку Edit данные отправятся в метод
	{
		//
	}

	/**
	* Remove the specified resource from storage.
	*
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function destroy($id) //удаление данных
	{
		$menu = $this->menu->find($id);
		$menu->delete();
		return back()->with('message',"Пункт $menu->title удален");
	}
}
