<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement('DROP TABLE IF EXISTS Employees;');
        Schema::create('Employees', function(Blueprint $table){
            $table->integer('EmployeeID')->autoIncrement()->nullable();
            $table->string('LastName', 20);
            $table->string('FirstName', 10);
            $table->string('Title', 30)->nullable();
            $table->string('TitleOfCourtesy', 25)->nullable();
            $table->dateTime('BirthDate')->nullable();
            $table->dateTime('HireDate')->nullable();
            $table->string('Address', 60)->nullable();
            $table->string('City', 15)->nullable();
            $table->string('Region', 15)->nullable();
            $table->string('PostalCode', 10)->nullable();
            $table->string('Country', 15)->nullable();
            $table->string('HomePhone', 24)->nullable();
            $table->string('Extension', 4)->nullable();
            $table->binary('Photo')->nullable();
            $table->mediumText('Notes');///
            $table->integer('ReportsTo')->nullable();
            $table->string('PhotoPath')->nullable();
            $table->float('Salary')->nullable();

            $table->index(['LastName','PostalCode']);

            $table->timestamps();
            $table->softDeletes();
        });

        //\Illuminate\Support\Facades\DB::statement("ALTER TABLE Employees ADD Photo LONGBLOB");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
