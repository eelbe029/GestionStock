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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Marque');
            $table->string('Model');
            $table->string('Etat');
            $table->unsignedBigInteger('typeId');
            $table->unsignedBigInteger('commandeId');

            $table->foreign('typeId')->references('id')->on('types');
            $table->foreign('commandeId')->references('id')->on('commandes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
