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
        //
        Schema::create('hrs', function (Blueprint $table) {
            $table->id();
            $table->string('hr_username', 50);
            $table->string('hr_firstname', 50);
            $table->string('hr_lastname', 50);
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
          Schema::dropIfExists('hrs');
    }
};
