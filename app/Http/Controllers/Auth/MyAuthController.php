<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class MyAuthController extends Controller
{
	public function showLoginForm()
	{
		return view('auth.login');
	}

	public function login(Request $request)
	{

		$array    = $request -> all();
		dump($array);

		$remember = $request->has('remember');

		if(Auth::attempt([
					'login' => $array['login'],
					'password' => $array['password']
				], $remember )){
			return redirect()->intended('/admin');
		}

		return 	redirect()->back()
							->withInput($request->only('login','remember'))
							->withErrors([
											'login'=>'Данные аутентификации не верны'
										 ]);
	}
}
