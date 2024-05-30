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
        Schema::create('userpermissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('business_id')->nullable();
            $table->string('role_name');
            $table->boolean('view_productcategory')->default(0);
            $table->boolean('add_productcategory')->default(0);
            $table->boolean('update_productcategory')->default(0);
            $table->boolean('delete_productcategory')->default(0);
            $table->boolean('view_product')->default(0);
            $table->boolean('add_product')->default(0);
            $table->boolean('update_product')->default(0);
            $table->boolean('delete_product')->default(0);
            $table->boolean('view_unit')->default(0);
            $table->boolean('add_unit')->default(0);
            $table->boolean('update_unit')->default(0);
            $table->boolean('delete_unit')->default(0);
            $table->boolean('view_stockcart')->default(0);
            $table->boolean('view_audits')->default(0);
            $table->boolean('view_stocklist')->default(0);
            $table->boolean('view_cart')->default(0);
            $table->boolean('view_barcode')->default(0);
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
        Schema::dropIfExists('userpermissions');
    }
};
