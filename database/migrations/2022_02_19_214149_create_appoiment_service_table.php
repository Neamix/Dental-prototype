<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppoimentServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoiment_service', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appoiment_id');
            $table->foreignId('service_id');
            $table->string('fees')->default('unpaid');
            $table->foreignId('receipt_id')->nullable();
            $table->integer('number');
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
        Schema::dropIfExists('appoiment_service');
    }
}
