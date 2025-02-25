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
        Schema::create('examinations', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('student_id')->constrained()->onDelete('cascade');
            // $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string(column: 'student_code');
            $table->string(column: 'course_code');
            $table->integer('mark_obtain');
            $table->timestamps();

            // Unique constraint on student_code and course_code
            $table->unique(['student_code', 'course_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examinations');
    }
};
