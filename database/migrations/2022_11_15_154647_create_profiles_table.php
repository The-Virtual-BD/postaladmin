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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('account_type')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('country')->nullable();
            $table->string('island')->nullable();
            $table->longText('address')->nullable();
            $table->string('house')->nullable();
            $table->string('region')->nullable();
            $table->string('location')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable();
            $table->string('nib')->nullable();
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
        Schema::dropIfExists('profiles');
    }
};