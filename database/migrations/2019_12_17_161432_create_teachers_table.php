<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string(' code');
            $table->string('image');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender',['male','female']);
            $table->date('dob');
            $table->string('address');
            $table->string('email');
            $table->string(' education');
            $table->double('salary');
            $table->integer('time_study_id');
            $table->enum('action',['enable','disable']);
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
        Schema::dropIfExists('teachers');
    }
}
