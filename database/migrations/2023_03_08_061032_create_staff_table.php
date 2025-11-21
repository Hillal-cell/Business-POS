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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('business_id')->nullable();
            $table->string('staff_name');
            $table->string('staff_email')->unique();
            $table->string('staff_dob');
            $table->string('staff_contact');
            $table->string('gender');
            $table->string('leave_days');
            $table->string('staff_address');
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
        Schema::dropIfExists('staff');
    }
};
