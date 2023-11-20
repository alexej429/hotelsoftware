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
        Schema::create('umweltdaten', function (Blueprint $table) {
            $table->id();
            $table->integer('wassertemperatur');
            $table->integer('Luftfeuchtigkeit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umweltdaten');
    }
};
