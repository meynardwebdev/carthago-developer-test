<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('sku')->nullable(false);
            $table->text('description')->nullable(false);
            $table->string('vendor')->nullable(false);
            $table->integer('quantity_in_stock')->nullable(false);
            $table->decimal('price')->nullable(false);
            $table->decimal('msrp')->nullable(false);
            $table->string('product_line_id')->nullable(false);
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
        Schema::dropIfExists('products');
    }
}
