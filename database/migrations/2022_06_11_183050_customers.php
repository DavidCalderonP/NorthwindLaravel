<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Customers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Customers', function(Blueprint $table){
            $table->string('CustomerID', 5);
            $table->string('CompanyName', 40);
            $table->string('ContactName', 30)->nullable();
            $table->string('ContactTitle', 30)->nullable();
            $table->string('Address', 60)->nullable();
            $table->string('City', 15)->nullable();
            $table->string('Region', 15)->nullable();
            $table->string('PostalCode', 10)->nullable();
            $table->string('Country', 15)->nullable();
            $table->string('Phone', 24)->nullable();
            $table->string('Fax', 24)->nullable();
            $table->primary('CustomerID');

            $table->index(['City','CompanyName','PostalCode','Region']);

            $table->timestamps();
            $table->softDeletes();
        });
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
