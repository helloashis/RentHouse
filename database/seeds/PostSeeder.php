<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();


        foreach(range(1,100) as $index){

            $images = ['apartment_1700900681595928.png','apartment_1700900681984527.png','apartment_1700900682148643.png','apartment_1701033352100372.png','apartment_1700900681836534.png'];
            foreach ($images as $img) {
                $path ='uploads/apartments/'.$img;

            }

            $name = $faker->jobTitle;
            $slug =lcfirst($name);
            Post::create([

                'user_id'                 	=>rand('1','50'),
                'title'                     =>$name,
                'slug'                      =>str_replace(' ','-',$slug),
                'floore'                     =>rand('1','5'),
                'rooms'             		=>rand('1','5'),
                'bath'  			        =>rand('1','3'),
                'type' 				        =>rand('1','5'),
                'available'    		        =>date('Y-m-d', strtotime('+1 month')),
                'price'	                    =>rand('1000','50000'),
                'description'               =>$faker->paragraph,
                'features'                 	=>$faker->paragraph,
                'address'              	 	=>$faker->secondaryAddress,
                'dist'		                =>'5',
                'city'				        =>rand('1','9'),
                'images_one'                =>$path,
                'images_two'                =>$path,
                'images_three'              =>$path,
                'images_four'               =>$path,
                'images_five'               =>$path,
                'status'                    =>'1',


            ]);



        }
    }
}
