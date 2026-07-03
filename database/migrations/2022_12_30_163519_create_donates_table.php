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
        Schema::create('donates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('names');
            $table->string('email');
            $table->string('amount');
            $table->string('period')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->bigInteger('program_id')->nullable();
            $table->bigInteger('sponsorship_id')->nullable();
            $table->string('message')->nullable();
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
        Schema::dropIfExists('donates');
    }
};
