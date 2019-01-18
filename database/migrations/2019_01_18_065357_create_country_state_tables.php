<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryStateTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
        {
            Schema::create('country', function(Blueprint $table){
                $table->increments('id');
                $table->string('name');
                $table->timestamps();
            });

            Schema::create('state', function(Blueprint $table){

                $table->increments('id');
                $table->integer('country_id');
                $table->string('name');
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
        Schema::dropIfExists('country_state_tables');
    }
}
