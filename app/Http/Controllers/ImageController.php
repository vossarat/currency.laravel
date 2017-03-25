<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Illuminate\Filesystem\FilesystemManager;

class ImageController extends Controller
{
	public function browse()
	{
		return view('admin.dashboard.browse')->with(['urlFiles'=>$this->getFiles()]);
	}

	public function getFiles()
	{
		$disk = Storage::disk('logotips');
		$allFiles = $disk->allFiles();
		return $allFiles;
	}

	public function imageUploadPost(Request $request)
	{
		$imageName = $request->image->getClientOriginalName();
		$request->image->move(storage_path('app/public/logotips'), $imageName);
		return 'ok';	
		//return back();		
	}
	
	public function sendFile(Request $request)
	{
		return $request;
		//$request->image->move(storage_path('app/public/logotips'), $request->image->getClientOriginalName());
		//return 'ok';
		//return back();		
	}
	

	public function delete(Request $request) 
	{
		$f = Storage::disk('logotips');
    	$f->delete($request->filename);   		
   		return back();
	}
	
	public function upload()
	{
		return 'ok';
	}
	
	public function getpostaction ()
	{
		return (__METHOD__);
	}

}
