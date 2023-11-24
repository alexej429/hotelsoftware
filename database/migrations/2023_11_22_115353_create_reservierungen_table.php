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
        Schema::create('reservierungen', function (Blueprint $table) {
            // $table->id();
            $table->timestamps();

            
            $table->foreign("zimmerId")->references("id")->on("benutzer");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservierungen');
    }
};
