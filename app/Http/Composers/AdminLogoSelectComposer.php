<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use Storage;

class AdminLogoSelectComposer {

    public function compose(View $view)
    {
    	$browseFiles = $this->getBrowseFiles();
        $view->with('browseFiles', $browseFiles);
	}
	
	public function getBrowseFiles(){
		$disk = Storage::disk('logotips');
		$allFiles = $disk->allFiles();
		return $allFiles;
	}
}