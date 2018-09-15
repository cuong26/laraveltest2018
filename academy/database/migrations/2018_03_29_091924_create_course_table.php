<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('teacher_id');
            $table->integer('category_id');
            $table->string('image');
            $table->integer('price');
            $table->text('description');
            $table->string('address');
            $table->text('information')->nullable();
            $table->integer('size');
            $table->boolean('feature');
            $table->string('level');
            $table->date('course_start');
            $table->date('course_end');
            $table->time('class_start');
            $table->time('class_end');
            $table->string('alias');
            $table->string('school_day');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
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
        //
    }
}
