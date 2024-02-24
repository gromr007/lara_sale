<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderpositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderpositions', function (Blueprint $table) {
            $table->id();

            $table->integer('kolvo');
            $table->integer('price')->nullable();

            $table->timestamp('deleted_at')->nullable();

            $table->integer('product_id');
            $table->integer('order_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orderpositions');
    }
}
