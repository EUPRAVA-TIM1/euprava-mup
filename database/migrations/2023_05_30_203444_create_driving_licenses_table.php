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
        Schema::create('driving_licenses', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->char('driver_license_num', 8);
            $table->string('categories');
            $table->date('issue_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->integer('penalty_points');
            $table->string('status');
            $table->string('official_id', 13)->nullable();
            $table->string('user_id', 13)->unique();
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
        Schema::dropIfExists('driving_licenses');
    }
}
