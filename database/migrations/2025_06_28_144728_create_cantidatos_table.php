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
        Schema::create('cantidatos', function (Blueprint $table) {
            $table->id();
            $table->foreignID('user_id')->constrained()->onDelete('cascade');
            $table->foreignID('vacante_id')->constrained()->onDelete('cascade');
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cantidatos');
    }
};
