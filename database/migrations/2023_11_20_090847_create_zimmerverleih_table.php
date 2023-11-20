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
        Schema::create('zimmerverleih', function (Blueprint $table) {
            $table->id();
            $table->integer('anzahlBetten');
            $table->boolean('istRaucher');
            $table->boolean('hatBalkon');
            $table->integer('preis');
            $table->boolean('istReserviert');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zimmerverleih');
    }
};
