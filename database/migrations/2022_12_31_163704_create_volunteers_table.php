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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('names');
            $table->string('slug')->nullable();
            $table->string('email');
            $table->string('address');
            $table->string('country');
            $table->longText('aboutYou')->nillable();
            $table->longText('career')->nillable();
            $table->longText('howToServe')->nillable();
            $table->bigInteger('program_id')->nillable();
            $table->string('status')->nillable();
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
        Schema::dropIfExists('volunteers');
    }
};
