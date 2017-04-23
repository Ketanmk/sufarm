<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_data', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('product_id')->unsigned();
            $table->integer('product_type_id')->unsigned();
            $table->integer('quantity_produced');
            $table->integer('created_by')->unsigned()->nullable();
            $table->integer('updated_by')->unsigned()->nullable();
            $table->foreign('created_by', 'fk_production_data_created_by_users_id')->references('id')->on('users');
            $table->foreign('updated_by', 'fk_production_data_updated_by_users_id')->references('id')->on('users');
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
        Schema::dropIfExists('production_data');
    }
}
