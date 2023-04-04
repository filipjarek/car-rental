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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('number_invoice');
            $table->foreignId('transaction_id')->nullable()->onDelete('cascade');
            $table->foreignId('company_id')->nullable()->onDelete('cascade');
            $table->date('invoice_date');
            $table->string('buyer');
            $table->string('NIP', 10)->nullable();
            $table->string('address', 50);
            $table->enum('payment_method', ['transfer', 'cash']); 
            $table->string('service', 50);
            $table->integer('VAT');
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
        Schema::dropIfExists('invoices');
    }
};
