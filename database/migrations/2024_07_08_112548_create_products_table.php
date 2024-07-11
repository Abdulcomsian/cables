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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('category_id');
            $table->string('unique_product_key');
            $table->enum('broadband_type', ['None','FTTC','ADSL']);
            $table->string('channels');
            $table->string('download_speed');
            $table->string('upload_speed');
            $table->string('keywords');
            $table->enum('calls', ['No','weekend','anytime','international']);
            $table->enum('line_rental', ['not required','included']);
            $table->double('set_up_cost',8,2);
            $table->double('stand_monthly',8,2);
            $table->double('promo_monthly',8,2);
            $table->string('basket_url');
            $table->string('contract_months');
            $table->string('thumbnail_retailer');
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
