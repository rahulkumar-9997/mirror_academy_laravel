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
            $table->string('course_certificate_title_1')->nullable()->after('course_certificate');
            $table->string('course_certificate_image_2')->nullable()->after('course_certificate_title_1');  
            $table->string('course_certificate_title_2')->nullable()->after('course_certificate_image_2');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->dropColumn([
                'course_certificate_title_1',
                'course_certificate_image_2',
                'course_certificate_title_2',
            ]);
        });
    }
};
