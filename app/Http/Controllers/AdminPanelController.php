<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;



class AdminPanelController extends Controller
{

	public function index()
	{
		return view('admin.index');
	}

	public function reg()
	{
		return view('auth.register');
	}
}
