<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProductAndProductTypeForiegnToProductionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('production_data', function (Blueprint $table) {
            $table->foreign('product_id', 'fk_production_data_product_id_products_id')->references('id')->on('products');
            $table->foreign('product_type_id', 'fk_production_data_product_type_id_product_types_id')->references('id')->on('product_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('production_data', function (Blueprint $table) {
            $table->dropForeign('fk_production_data_product_id_products_id');
            $table->dropForeign('fk_production_data_product_type_id_product_types_id');
        });
    }
}
