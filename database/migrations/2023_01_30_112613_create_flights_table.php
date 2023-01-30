<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->date('requestDate')->nullable();
            $table->integer('leg')->nullable();
            $table->string('flightNo')->nullable();
            $table->string('origin')->nullable();
            $table->string('deperture')->nullable();
            $table->dateTime('deptime')->nullable();
            $table->dateTime('arrtime')->nullable();
            $table->time('ftime')->nullable();
            $table->string('equipment')->nullable();
            $table->string('change')->nullable();
            $table->integer('connect')->nullable();
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
        Schema::dropIfExists('flights');
    }
};
