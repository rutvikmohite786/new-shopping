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
        Schema::table('product_attributes', function (Blueprint $table) {
            $table->foreignId('product_id')->after('attribute_id')
            ->constrained('products')
            ->onDelete('cascade');
            $table->string('attribute_value')->after('product_id');
            $table->foreignId('color_id')->after('attribute_value')
            ->constrained('colors')
            ->onDelete('cascade');
            $table->string('selling_price')->after('color_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_attributes', function (Blueprint $table) {
            //
        });
    }
};
