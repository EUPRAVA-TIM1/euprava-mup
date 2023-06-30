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
        Schema::create('vozilo', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('marka');
            $table->string('model');
            $table->integer('godina');
            $table->string('boja');
            $table->string('regBroj')->unique();
            $table->integer('snagaMotora');
            $table->integer('maksimalnaBrzina');
            $table->integer('brojSedista');
            $table->integer('tezina');
            $table->string('tipVozila');
            $table->string('statusRegistracije');
            $table->dateTime('prijavljenaKradja')->nullable();
            $table->string('odobrioSluzbenik', 13)->nullable();
            $table->string('korisnik', 13);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vozilo');
    }
};
