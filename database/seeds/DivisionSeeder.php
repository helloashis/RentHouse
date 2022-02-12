<?php

use Illuminate\Database\Seeder;
use App\Division;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker\Factory::create();
        $division = ['Dhaka','Sylhet','Chottogram','Rajshahi','Rangpur','Mymensingh','Khulna','Barisal'];

        foreach ($division as $division) {
                $slug =lcfirst($division);
                Division::create([

                    'title' =>$division,
                    'slug' =>str_replace(' ','-',$slug),
                    'status' =>'1',

                ]);

        }
    }
}
