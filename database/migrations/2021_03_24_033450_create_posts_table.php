<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('slug');
            $table->string('floore');
            $table->string('rooms');
            $table->string('bath');
            $table->string('type');
            $table->string('available');
            $table->string('price');
            $table->longText('description');
            $table->longText('features');
            $table->longText('address');
            $table->tinyInteger('dist');
            $table->tinyInteger('city');
            $table->string('images_one');
            $table->string('images_two');
            $table->string('images_three');
            $table->string('images_four');
            $table->string('images_five');
            $table->string('status')->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
