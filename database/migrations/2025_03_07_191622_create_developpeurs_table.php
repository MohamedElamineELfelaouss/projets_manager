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
        Schema::create('developpeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nomDev');
            $table->string('prenomDev');
            $table->string('cvDev');
            $table->string('photoDev');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('developpeurs');
    }
};
