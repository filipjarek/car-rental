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

        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50); 
            $table->enum('category', ['car', 'motorcycle']); 
            $table->string('color', 15)->nullable();
            $table->integer('year', );    
            $table->integer('capacity', ); 
            $table->integer('power', );
            $table->string('status')->default('Y');      
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
        Schema::dropIfExists('vehicles');
        
    }
};
