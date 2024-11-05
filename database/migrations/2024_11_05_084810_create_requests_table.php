<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id(); // Primaire sleutel
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Verbindt met de users tabel
            $table->string('omschrijving'); // Omschrijving van het verzoek
            $table->string('typemachine');  // Type machine
            $table->string('garantie');      // Garantie-informatie
            $table->date('datum');           // Datum van het verzoek
            $table->timestamps();            // Created at en updated at
        });
    }

    public function down()
    {
        Schema::dropIfExists('requests');
    }
}