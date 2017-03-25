<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\UserRequest;
use App\Http\Requests\OfficeRequest;
use App\User;
use App\City;
use App\Office;

class AdminUserController extends Controller
{
	
	public function __construct(User $user, City $city)
	{
		$this->user = $user;
		$this->city = $city;
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
				'cities' => $this->city->all(),
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
		$addUser = $this->user->create($request->modifyRequest('all'));
		
		$addUser->password = bcrypt($request->password);		
		$addUser->office()->create($request->modifyRequest('all'));
		$addUser->save();
		return redirect(route('users.index'))->with('message', "Пользователь $addUser->name добавлен");
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		//
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
				'view_user' => $this->user->find($id),
				'view_office' => $this->user->find($id)->office()->first(),
				'cities' => $this->city->all(),	
				'browseFiles'=>$this->user->getFilesForBrowse(),			
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
		$user->update($request->modifyRequest('all'));

		$user->office()->update($request->modifyRequest());
		$user->password = bcrypt($request->password);		

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
		$user->office()->delete();
		$user->delete();		
		return back()->with('message', "Пользователь $user->name удален");
    }
}
