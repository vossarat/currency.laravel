<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Office;
use App\OfficePage;

class UsersTableSeeder extends Seeder
{

    public function __construct(OfficePage $officePage){
        $this->officePage = $officePage;
    }

    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run(){

        $currencyJsonData = collect($this->officePage->getCurrencyJsonData());
        //dd($currencyJsonData->first());

        foreach($currencyJsonData as $newUser){
            
            $addUser = User::create([
                    'login'=>$newUser->name,
                    'name'=>$newUser->name,
                    'email'=>$newUser->url,
                    'password'=> bcrypt('123456'),
                ]);

            $addUser->office()->create([

                    'fullname' => $newUser->name,
                    'geolocation' => 'XX"XX"XX"',
                    'image' => $newUser->name . '.png',
                    'phone' => $newUser->contacts,
                ]);

            $addUser->save();
        }


    }
}
