<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('city');
            $table->string('street');
            $table->string('postcode');
            $table->string('house_number');
            $table->string('phone');
            $table->string('payment_method');
            $table->decimal('total_price', 10, 2); // Store total price of the order
            $table->string('user_password'); // Storing the password for confirmation
            $table->boolean('terms_accepted')->default(false); // Check if terms were accepted
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
;