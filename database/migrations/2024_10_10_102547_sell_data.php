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
        Schema::create('sell_data', function (Blueprint $table) {
            $table->id(); 
            $table->date('sell_data');
            $table->unsignedBigInteger('products_id');
            $table->unsignedBigInteger('users_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('sell_data');
    }
};
