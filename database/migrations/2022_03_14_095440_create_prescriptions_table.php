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
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('num_fiche')->constrained;
            $table->foreignId('medicament_id')->constrained;
            $table->foreignId('matricule_medecin')->constrained;
            
            $table->string('service')->nullable();
            $table->integer('qty_med_presc');
            $table->char('date_prescr');
            $table->string('statut')->default('Non servi');
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
        Schema::dropIfExists('prescriptions');
    }
};
