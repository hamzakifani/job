<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('title');
            $table->string('discription');
            $table->string('location');
            $table->string('prix');
            $table->boolean('status')->default(false);
            $table->enum('type', array('FullTime', 'PartTime','Freelance', 'Internship', 'Termporary'));
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
        Schema::dropIfExists('jobs');
 
    }
}
