<?php

use Illuminate\Database\Seeder;

class SocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('socials')->insert([
            'fb_ulr'    => 'https://www.facebook.com/',
            'inst_url'  => 'https://www.instagram.com/',
            'twt_url'   => 'https://www.twitter.com/',
            'gle_url'   => 'https://www.google-plus.com/',
        ]);
    }
}
