<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmplois extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emplois', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nom');
            $table->string('email');
            $table->string('phone');
            $table->string('motivation');
            $table->integer('job_id')->unsigned();;
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
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
        $table->dropForeign(['job_id']);
        $table->dropColumn('job_id');
        Schema::dropIfExists('emplois');
    }
}
