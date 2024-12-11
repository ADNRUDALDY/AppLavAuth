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
        Schema::create('visiteurs', function (Blueprint $table) {
            $table->id('id_visiteur');
            $table->string('Nom');
            $table->string('Prenom');
            $table->date('Naiss');
            $table->string('Lieu');
            $table->string('Sexe');
            $table->string('Diplome');
            $table->string('Fonction');
            $table->string('Tel');
            $table->string('mail')->unique();
            $table->unsignedBigInteger('id_loc')->nullable();
            $table->foreign('id_loc')->references('id_loc')->on('localites')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visiteurs');
    }
};
