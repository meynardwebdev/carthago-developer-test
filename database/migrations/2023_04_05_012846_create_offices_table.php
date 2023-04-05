<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('city')->nullable(false);
            $table->string('phone')->nullable(false);
            $table->string('address_line_1')->nullable(false);
            $table->string('address_line_2')->nullable(false);
            $table->string('state')->nullable(false);
            $table->string('postal_code')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('territory')->nullable(false);
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
        Schema::dropIfExists('offices');
    }
}
