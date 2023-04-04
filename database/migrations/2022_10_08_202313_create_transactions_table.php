<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('transaction_date');
            $table->foreignId('employee_id')->nullable();
            $table->foreignId('customer_id')->nullable();
            $table->foreignId('vehicle_id')->nullable();
            $table->timestamp('rent_date')->nullable();
            $table->timestamp('return_date')->nullable();
            $table->decimal('price');
            $table->decimal('finee');
            $table->string('rent_status')->nullable();
            $table->timestamp('return_day')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
