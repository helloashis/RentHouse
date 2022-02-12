<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    /*
        DB::table('users')->insert([
            'name' => 'Ami User',
            'photo' => 'default_user.jpg',
            'phone' => '01776586611',
            'email' => 'user@gmail.com',
            'division' => '1',
            'district' => '1',
            'password' => Hash::make('password'),
            'status'    => '1',
        ]);
    */
        $faker = Faker\Factory::create();
        foreach(range(1,50) as $index){
            User::create([

                'name' => $faker->name,
                'photo' => 'default_user.jpg',
                'phone' => $faker->e164PhoneNumber,
                'email' => $faker->freeEmail,
                'division' => '2',
                'district' => '5',
                'password' => Hash::make('password'),
                'status'    => '1',
            ]);
        }

    }
}
