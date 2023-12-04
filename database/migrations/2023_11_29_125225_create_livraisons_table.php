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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->date('date_livraison');
            $table->string('statut');
            $table->string('adresse');
            $table->string('frais_livraison');
            $table->string('transporteur');
            $table->string('delais_livraison');
            $table->timestamps();

            $table->unsignedBigInteger('commandes_id')->unsigned();
            $table->foreign('commandes_id')->references('id')->on('commandes')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
