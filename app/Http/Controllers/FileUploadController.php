<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class FileUploadController extends Controller
{
	public function upload(Request $request)
	{
		$request->logotip->move(storage_path('app/public/logotips'), $request->logotip->getClientOriginalName());
		return view('admin.user.logoselect');
	}
}
