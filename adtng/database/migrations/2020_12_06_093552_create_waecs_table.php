<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waecs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('trans_id');
            $table->string('service');
            $table->string('package');
            $table->string('price');
            $table->string('pin');
            $table->string('serial_number');
            $table->boolean('status')->default('1');
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
        Schema::dropIfExists('waecs');
    }
}
