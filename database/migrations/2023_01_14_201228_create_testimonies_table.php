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
        Schema::create('testimonies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('names');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('age')->nullable();
            $table->bigInteger('program_id')->nullable();
            $table->longText('testimony')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('Publish');
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
        Schema::dropIfExists('testimonies');
    }
};
