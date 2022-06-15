<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Orders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Orders', function(Blueprint $table){
            $table->integer('OrderID')->autoIncrement();
            $table->string('CustomerID', 5)->nullable();
            $table->integer('EmployeeID')->nullable();
            $table->dateTime('OrderDate')->nullable();
            $table->dateTime('RequiredDate')->nullable();
            $table->dateTime('ShippedDate')->nullable();
            $table->integer('ShipVia')->nullable();
            $table->decimal('Freight', 10, 4)->default(0)->nullable();

            $table->string('ShipName', 40)->nullable();
            $table->string('ShipAddress', 60)->nullable();
            $table->string('ShipCity', 15)->nullable();
            $table->string('ShipRegion', 15)->nullable();
            $table->string('ShipPostalCode', 10)->nullable();
            $table->string('ShipCountry', 15)->nullable();

            $table->index(['OrderDate', 'ShippedDate', 'ShipPostalCode']);


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
