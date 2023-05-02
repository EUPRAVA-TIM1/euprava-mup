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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('color');
            $table->integer('engine_power');
            $table->integer('max_speed');
            $table->integer('num_of_seats');
            $table->integer('weight');
            $table->enum('vehicle_type', [
                'PUTNICKO_VOZILO',
                'TERETNO_VOZILO',
                'AUTOBUS',
                'KAMION',
                'MOTORNI_BICIKL',
                'SKUTER',
                'MOTORNO_TRICIKLO',
                'MOTORNO_CETVOROCIKLO',
                'PRIKLJUCNO_VOZILO',
                'SPECIJALNO_VOZILO'
            ]);
            $table->string('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
