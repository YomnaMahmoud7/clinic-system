<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdviceRochta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advice_rochta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rochta_id');
            $table->unsignedInteger('advice_id');

            $table->foreign('rochta_id')->references('id')->on('rochtas')->onDelete('cascade');
            $table->foreign('advice_id')->references('id')->on('advices')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('advice_rochta');
    }
}
