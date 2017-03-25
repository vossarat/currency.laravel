<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Menu;


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
	public function index() //основная страница просмотра
	{
		$viewdata = $this->menu->all();
		return view('admin.menu.index')->with(['viewdata'=>$viewdata, 'title'=>'Меню']);
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
				'categories'=>$this->menu->categories()->get(['title']),
				'positions'=>$this->menu->getPosition(),
			]);
	}

	/**
	* Store a newly created resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @return \Illuminate\Http\Response
	*/
	public function store(MenuRequest $request) //по нажатию на кнопку Create данные отправятся в этот метод
	{

		Menu::create($request->modifyRequest());
		
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
		return view('admin.menu.edit')->with([
				'title'=>'Редактирование Меню',
				'positions'=>$this->menu->getPosition(),
				'categories'=>$this->menu->categories()->get(),
				'viewdata' => $this->menu->find($id),
			]);
	}
	
	
	/**
	* Update the specified resource in storage.
	*
	* @param  \Illuminate\Http\Request  $request
	* @param  int  $id
	* @return \Illuminate\Http\Response
	*/
	public function update($id, MenuRequest $request) //по нажатию на кнопку Edit данные отправятся в метод
	{
		$menu=$this->menu->find($id);	
		
		$menu->update($request->modifyRequest());
		$menu->save();
		return redirect(route('menus.index'))->with('message',"Пункт $menu->title изменен");
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
