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
        Schema::create('workers', function (Blueprint $table) {
            $table->id('matricola')->autoIncrement();
            $table->string('nome',50);
            $table->string('cognome',50);
            $table->string('ruolo',50)->foreign('ruolo')->references('nome_ruolo')->on('ruolo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dipendente');
    }
};
