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
        Schema::create('campains', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->decimal('goal', 10, 2)->default(0);
            $table->decimal('raised', 10, 2)->default(0);
            $table->integer('percentage')->default(0);
            $table->unsignedInteger('target_people')->nullable();
            $table->decimal('cost_per_person', 10, 2)->nullable();
            $table->string('call_to_action')->nullable();
            $table->string('donation_url')->nullable();
            $table->string('youtube_video')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('active');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::dropIfExists('campains');
    }
};
