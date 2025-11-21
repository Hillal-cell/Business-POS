<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasecartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasecarts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('business_id')->nullable();
            $table->string('coreproduct_id');
            $table->string('buyingunit');
            $table->string('batchno');
            $table->string('expirydate');
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
        Schema::dropIfExists('purchasecarts');
    }
}
