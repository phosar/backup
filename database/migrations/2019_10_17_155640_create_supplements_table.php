<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupplementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplements', function (Blueprint $table) {
            $table->increments('supplement_id');
            $table->string('supplement_name');
            $table->integer('supplement_price');
            $table->string('supplement_description');
            $table->string('supplement_pic');
            $table->unsignedBigInteger('supplement_category_id');
            $table->unsignedBigInteger('supplier_id');
            //$table->foreign('supplement_category_id')->references('supplement_category_id')->on('supplement_categories');
            //$table->foreign('supplier_id')->references('supplier_id')->on('supplement_suppliers');
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
        Schema::drop('supplements');
    }
}
