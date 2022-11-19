<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('salary');
            $table->string('other_income');
            $table->string('total_income');
            $table->string('family_expense');
            $table->string('transport_expense');
            $table->string('meal_expense');
            $table->string('total_expense');
            $table->string('net_income');
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
        Schema::dropIfExists('laporans');
    }
};
