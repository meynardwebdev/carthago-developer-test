<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('last_name')->nullable(false);
            $table->string('first_name')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('address_line_1')->nullable(false);
            $table->string('address_line_2')->nullable(false);
            $table->string('city')->nullable(false);
            $table->string('state')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('postal_code')->nullable(false);
            $table->integer('sales_representative_id');
            $table->float('credit_limit');
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
        Schema::dropIfExists('customers');
    }
}
