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
        Schema::create('appros', function (Blueprint $table) {
            $table->id();
            $table->foreignId('medicament_id');
            $table->foreignId('fournisseur_id');
            $table->string('num_lot');
            $table->integer('qty_ee');
            $table->date('date_exp');
            $table->date('date_appro');
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
        Schema::dropIfExists('appros');
    }
};
