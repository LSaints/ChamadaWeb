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
        Schema::create('student_disciplines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('registration');
            $table->foreign('registration')->references('registration')->on('users')->onDelete('cascade');
            $table->foreignId('discipline_id')->constrained('disciplines')->onDelete('cascade');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('disciplines', function (Blueprint $table) {

        });
    }
};
