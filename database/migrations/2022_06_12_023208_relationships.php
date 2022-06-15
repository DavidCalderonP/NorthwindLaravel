<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Relationships extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('CustomerCustomerDemo', function (Blueprint $table){
            $table->foreign('CustomerTypeID', 'FK_CustomerCustomerDemo')->references('CustomerTypeID')->on('CustomerDemographics');
        });

        Schema::table('CustomerCustomerDemo', function (Blueprint $table){
            $table->foreign('CustomerID', 'FK_CustomerCustomerDemo_Customers')->references('CustomerID')->on('Customers');
        });

        Schema::table('Employees', function (Blueprint $table){
            $table->foreign('ReportsTo', 'FK_Employees_Employees')->references('EmployeeID')->on('Employees');
        });

        Schema::table('EmployeeTerritories', function (Blueprint $table){
            $table->foreign('EmployeeID', 'FK_EmployeeTerritories_Employees')->references('EmployeeID')->on('Employees');
        });

        Schema::table('EmployeeTerritories', function (Blueprint $table){
            $table->foreign('TerritoryID', 'FK_EmployeeTerritories_Territories')->references('TerritoryID')->on('Territories');
        });

        Schema::table('Order Details', function (Blueprint $table){
            $table->foreign('OrderID', 'FK_Order_Details_Orders')->references('OrderID')->on('Orders');
        });

        Schema::table('Order Details', function (Blueprint $table){
            $table->foreign('ProductID', 'FK_Order_Details_Products')->references('ProductID')->on('Products');
        });

        Schema::table('Orders', function (Blueprint $table){
            $table->foreign('CustomerID', 'FK_Orders_Customers')->references('CustomerID')->on('Customers');
        });

        Schema::table('Orders', function (Blueprint $table){
            $table->foreign('EmployeeID', 'FK_Orders_Employees')->references('EmployeeID')->on('Employees');
        });

        Schema::table('Orders', function (Blueprint $table){
            $table->foreign('ShipVia', 'FK_Orders_Shippers')->references('ShipperID')->on('Shippers');
        });

        Schema::table('Products', function (Blueprint $table){
            $table->foreign('CategoryID', 'FK_Products_Categories')->references('CategoryID')->on('Categories');
        });

        Schema::table('Products', function (Blueprint $table){
            $table->foreign('SupplierID', 'FK_Products_Suppliers')->references('SupplierID')->on('Suppliers');
        });

        Schema::table('Territories', function (Blueprint $table){
            $table->foreign('RegionID', 'FK_Territories_Region')->references('RegionID')->on('Region');
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
