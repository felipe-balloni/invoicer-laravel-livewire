<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers_fields', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->string('field_key');
            $table->string('field_value');
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
        Schema::dropIfExists('customers_fields');
    }
}
