<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReqperiodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reqperiods', function (Blueprint $table) {
            $table->id();
            $table->time('start_date');
            $table->time('end_date');
            $table->unsignedBigInteger('resrequest_id');
            $table->timestamps();
            $table->foreign('resrequest_id')->references('id')->on('resrequests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reqperiods');
    }
}
