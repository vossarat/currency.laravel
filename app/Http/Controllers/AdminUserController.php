<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;

class AdminUserController extends Controller
{
	public function __construct(User $user)
	{
		$this->user = $user;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $viewdata = $this->user->all();
		return view('admin.user.index')->with(['viewdata'=>$viewdata, 'title'=>'Пользователи']);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create')->with([
				'title'=>'Пользователь',
			]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());        
		return redirect(route('users.index'))->with('message','Пользователь добавлен');											 
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    	
        return view('admin.user.edit')->with([
				'title'=>'Редактирование пользователя',
				'viewdata' => $this->user->find($id),
			]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->user->find($id);
		$user->update($request->all());
		$user->save();
		return redirect(route('users.index'))->with('message',"Информация по пользователю $user->name изменена");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user->find($id);
		$user->delete();
		return back()->with('message', "Пользователь $user->name удален");
    }
}
