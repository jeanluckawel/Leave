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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id('DemandeID');
            $table->string('EmployeeID', 100)->nullable();
            $table->integer('TypeCongeID')->nullable();
            $table->date('DateDebut')->nullable();
            $table->date('DateFin')->nullable();
            $table->integer('TotalNumberDay')->nullable();
            $table->date('DateRetourSite')->nullable();
            $table->string('LineManager', 100)->nullable();
            $table->string('Manager', 50)->nullable();
            $table->dateTime('DateDemande')->nullable();
            $table->string('DemandePar', 100)->nullable();
            $table->integer('Statut')->nullable();
            $table->boolean('SystPointage')->nullable();
            $table->date('DatePointage')->nullable();
            $table->string('AgentPointage', 100)->nullable();
            $table->boolean('PayRollSysteme')->nullable();
            $table->dateTime('DatePayrollSystem')->nullable();
            $table->string('AgentPayRoll', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
