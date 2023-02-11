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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('fullname', 50);
            $table->string('email');
            $table->enum('gender', ['male', 'female']); 
            $table->string('phone', 13)->nullable();
            $table->string('address', 50);
            $table->string('zip_code', 20);
            $table->date('employment_date');
            $table->date('dismissal_date')->nullable();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('employee_id')->after('id')->nullable();
            $table->foreign('employee_id')->references('id')->on('employees');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_employee_id_foreign');
            $table->dropColumn('employee_id');

            });
        Schema::dropIfExists('employees');
    }
};
