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
        Schema::create('jobposts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('title');
            $table->string('description');
            $table->string('category');
            $table->string('image');
            $table->string('url');
            $table->string('education');
            $table->string('price');
            $table->string('discount_price');
            $table->string('status');
            $table->string('designation');
            $table->string('duration');
            $table->string('qualification');
            $table->string('work_experience');
            $table->string('total_price');
            $table->foreignId('post_created_by');
            $table->foreign('post_created_by')->on('users')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('jobposts');
    }
};
