<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('product', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('category_id');
        $table->string('name');
        $table->string('picture')->nullable();
        $table->decimal('price', 8, 2);
        $table->text('productInformation');
        $table->text('specifications');
        $table->timestamps();  // created_at and updated_at columns
    });
}
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('product');
    }
};
