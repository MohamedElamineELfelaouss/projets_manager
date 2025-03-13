<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('taches', function (Blueprint $table) {
            $table->id();
            $table->string('nomTache');
            $table->unsignedBigInteger('idProjet');
            $table->unsignedBigInteger('idDev');
            $table->integer('duree');
            $table->decimal('coutHeure', 8, 2);
            $table->string('etat');
            $table->foreign('idProjet')->references('id')->on('projets')->onDelete('cascade');
            $table->foreign('idDev')->references('id')->on('developpeurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taches');
    }
};
