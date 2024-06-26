<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations. Schema pour les historiques d'assignation mais aussi pour
     * Reperesenter les assignations actuelles
     * active est un attribut booleen permettant de savoir si une assignation est en vigueur
     */
    public function up(): void
    {
        Schema::create('historiques', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('DateAssignement');
            $table->date('DateDissociation');
            $table->boolean('active');
            $table->unsignedBigInteger('articleId');
            $table->unsignedBigInteger('personnelId');

            $table->foreign('articleId')->references('id')->on('articles');
            $table->foreign('personnelId')->references('id')->on('personnels');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historiques');
    }
};
