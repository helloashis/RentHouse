<?php

use App\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $city = ['BandorBazar','LamaBazar','ZindaBazar','Chowhatta','Bagbari','ModinaMarket','Shibgonj','Upshohor'];

        foreach ($city as $city) {
                $slug =lcfirst($city);
                City::create([

                    'district_id' =>'5',
                    'title' =>$city,
                    'slug' =>str_replace(' ','-',$slug),
                    'status' =>'1',

                ]);

        }
    }
}
