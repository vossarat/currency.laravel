<?php namespace App\Http\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Users\Repository as UserRepository;
use App\Menu;

class DefaultSidebarComposer
{
	public function __construct(Menu $menu)
	{
		$this->menu = $menu;
	}

	public function compose(View $view)
	{
		$viewdata = $this->menu->published()->position('default-sidebar')->orderBy('weight')->get();
		$view->with('viewdata', $viewdata);
	}
}