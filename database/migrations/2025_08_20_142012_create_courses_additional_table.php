<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses_additional', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('courses_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('short_order')->default(0);
            $table->timestamps();
            $table->softDeletes();     
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
            $table->index('short_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_additional');
    }
};
