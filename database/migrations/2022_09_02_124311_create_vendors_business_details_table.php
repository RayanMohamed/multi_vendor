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
        Schema::create('vendors_business_details', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id');
            $table->string('shop_name');
            $table->string('shop_address');
            $table->string('shop_mobile');
            $table->string('shop_email');
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
        Schema::dropIfExists('vendors_business_details');
    }
};