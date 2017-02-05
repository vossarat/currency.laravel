<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Menu;


class AdminController extends Controller
{
	public function __construct(Menu $menus, User $users){
		$this->menus = $menus;
		$this->users = $users;
	}	
	
    public function index(){
        return view('admin.index');
    }

    public function tableUsers(){
    	$viewdata = $this->users->getUser();
        return view('admin.users')->with(['viewdata'=>$viewdata, 'title'=>'Пользователи']);
    }
    
    public function editUser($id) {
    	$myclass = new User;
    	dd( $myclass->editUser($id) );
		return view('admin.users');
	}
	   
}
