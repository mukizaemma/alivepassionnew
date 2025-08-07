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
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('body');
            $table->string('slug')->nullable();
            $table->string('author')->nullable();
            $table->string('image')->nullable();
            $table->longText('gallery')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->unsignedBigInteger('published_by')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('published_by')->references('id')->on('users')->onDelete('cascade')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
