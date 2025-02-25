<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->text('student_code')->unique();;
        $table->string('name');
        $table->string('phone');
        $table->string('email')->unique(); // Ensuring email is unique
        $table->date('dob');
        $table->enum('gender', ['male', 'female']);
        $table->string('major');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
