<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('product_id')->unsigned()->nullable();
            $table->string('name', 100);
            $table->integer('price')->unsigned();
            $table->text('desc')->nullable();
            $table->tinyInteger('quantity')->unsigned()->default(1);
            $table->integer('cost')->unsigned();
            $table->timestamps();

            $table->foreign('order_id')
            ->references('id')
            ->on('orders')
            ->cascadeOnDelete();
        
            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->nullOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
