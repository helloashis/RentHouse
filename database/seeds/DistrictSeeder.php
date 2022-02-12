<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $dist2 = ['Sylhet','Sunamgonj','MouloviBazar','Habigonj'];
        $dist = ['Mymensingh','Netrokona','Jamalpur','Sherpur'];

        foreach ($dist as $dist) {
                //$slug =lcfirst($dist);
                District::create([

                    'division_id' =>'6',
                    'title' =>$dist,
                    //'slug' =>str_replace(' ','-',$slug),
                    'status' =>'1',

                ]);

        }
        foreach ($dist2 as $dist2) {
            //$slug =lcfirst($dist);
            District::create([

                'division_id' =>'2',
                'title' =>$dist2,
                //'slug' =>str_replace(' ','-',$slug),
                'status' =>'1',

            ]);

    }
    }
}
