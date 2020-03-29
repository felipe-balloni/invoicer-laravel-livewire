<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->string('name');
            $table->decimal('quantity');
            $table->decimal('price');
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
        Schema::dropIfExists('invoices_items');
    }
}
