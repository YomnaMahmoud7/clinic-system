<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrugRochtaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drug_rochta', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('rochta_id');
            $table->unsignedInteger('drug_id');

            $table->foreign('rochta_id')->references('id')->on('rochtas')->onDelete('cascade');
            $table->foreign('drug_id')->references('id')->on('drugs')->onDelete('cascade');
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
        Schema::dropIfExists('drug_rochta');
    }
}
