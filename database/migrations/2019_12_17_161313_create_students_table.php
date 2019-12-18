<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string(' code');
            $table->string('image');
            $table->string('first_name');
            $table->string('last_name');
            $table->enum('gender',['male','female']);
            $table->date('dob');
            $table->string('address');
            $table->string('email');
            $table->integer(' generation');
            $table->integer('major_id');
            $table->integer('time_study_id');
            $table->integer('attendance_id');
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
        Schema::dropIfExists('students');
    }
}
