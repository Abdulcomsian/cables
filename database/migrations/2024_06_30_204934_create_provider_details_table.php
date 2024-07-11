<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provider_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('provide_id');
            $table->foreign('provider_id')->references('id')->on('broadband_providers');
            $table->string('unique_product_key');
            $table->string('isp_subcat');
            $table->string('category');
            $table->string('product_title');
            $table->string('broadband_type');
            $table->string('channels');
            $table->string('download_speed');
            $table->string('upload_speed');
            $table->string('keywords');
            $table->string('calls');
            $table->string('line_rental');
            $table->string('set_up_cost');
            $table->string('stand_monthly');
            $table->string('promo_monthly');
            $table->string('basket');
            $table->string('contract');
            $table->string('promo_and_info');
            $table->string('offer_ends');
            $table->string('thumbnail_retailer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_details');
    }
};
