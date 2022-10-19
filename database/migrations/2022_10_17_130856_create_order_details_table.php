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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->restrictOnUpdate()->restrictOnDelete();
            $table->foreignId('food_id')->constrained('foods')->restrictOnUpdate()->restrictOnDelete();
            $table->integer('qty');
            $table->integer('total_price');
            $table->timestamps();

            $table->unique(["order_id", "food_id"], 'order_food_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
};
