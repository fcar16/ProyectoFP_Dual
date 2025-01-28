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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('dni', 9)->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('CV')->nullable();
            $table->enum('group', ['1-ASIR', '2-ASIR', '1-DAW', '2-DAW', '1-DAM', '2-DAM']);
            $table->enum('course', ['24/25', '25/26', '26/27']);
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
