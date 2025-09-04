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
        Schema::create('courses_eligibilities', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('courses_id');
            $table->string('title')->nullable();
            $table->string('image')->nullable();
            $table->text('content')->nullable();
            $table->integer('short_order')->default(0);
            $table->timestamps();
            $table->foreign('courses_id')->references('id')->on('courses')->onDelete('cascade');
            $table->index('short_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses_eligibilities');
    }
};
