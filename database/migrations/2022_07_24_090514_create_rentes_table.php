<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('car_id');
            $table->string('najemnik_ime');
            $table->string('najemnik_priimek');
            $table->string('najemnik_naslov');
            $table->string('najemnik_email');
            $table->string('najemnik_telefon');
            $table->string('gorivo');
            $table->date('najem_od');
            $table->date('najem_do');
            $table->date('vrnjen_dne')->nullable;

            $table->timestamps();

            $table->index('user_id');
            $table->index('car_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentes');
    }
}
