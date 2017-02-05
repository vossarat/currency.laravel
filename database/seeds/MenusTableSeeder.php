<?php

use Illuminate\Database\Seeder;
use App\Menu;

class MenusTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run(){
        
        Menu::create([
                'title'=>'Обменные пункты',
                'url'=>'changeoffice',
                'published'=>1,
                'weight'=>1,
                'position'=>'topmenu',
                'parent'=>0,

            ]);

        Menu::create([
                'title'=>'Новости KASE',
                'url'=>'news',
                'published'=>1,
                'weight'=>1,

            ]);

    }
}
