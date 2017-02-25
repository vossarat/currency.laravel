<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         foreach($this->getCities() as $city){
		 	City::create([
                'name'=> $city,
            ]);
		 }
         
    }
    
    public function getCities() {
		return ['Астана', 'Алматы', 'Кокшетау', 'Караганда',];
	}
}
