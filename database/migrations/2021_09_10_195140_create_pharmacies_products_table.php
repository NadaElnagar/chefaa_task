<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePharmaciesProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pharmacies_products', function (Blueprint $table) {
            $table->id();
            $table->integer('products_id');
            $table->integer('pharmacies_id');
            $table->integer('quantity');
            $table->double('price');
            $table->unique(['products_id','pharmacies_id']);
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
        Schema::dropIfExists('pharmacies_products');
    }
}
