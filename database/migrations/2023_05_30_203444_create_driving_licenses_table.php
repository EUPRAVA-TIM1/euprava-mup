<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivingLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vozackaDozvola', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('brojVozackeDozvole', 8)->unique();
            $table->string('katergorijeVozila');
            $table->date('datumIzdavanja')->nullable();
            $table->date('datumIsteka')->nullable();
            $table->integer('brojKaznenihPoena');
            $table->string('statusVozackeDozvole');
            $table->string('odobrioSluzbenik', 13)->nullable();
            $table->string('korisnik', 13)->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vozackaDozvola');
    }
}
