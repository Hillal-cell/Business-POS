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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('business_id')->nullable();
            $table->string('product_name');
            $table->string('product_categoryid');
            $table->string('selling_price');
            $table->string('quantity');
            $table->string('product_code')->nullable();
            $table->text('barcode')->nullable();
            // $table->string('qty_id');
            $table->string('unit_id');
            $table->integer('alert_stock');
            // $table->integer('product_stock');
            $table->string('buying_price');
            // $table->date('expirydate');
            // $table->string('batchno');
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
        Schema::dropIfExists('products');
    }
};
