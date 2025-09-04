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
        Schema::table('courses', function (Blueprint $table) {
            $table->string('course_duration')->nullable()->after('page_image');
            $table->string('course_opening_days')->nullable()->after('course_duration');
            $table->string('course_timings')->nullable()->after('course_opening_days');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course', function (Blueprint $table) {
            $table->dropColumn(['course_duration', 'course_opening_days', 'course_timings']);
        });
    }
};
