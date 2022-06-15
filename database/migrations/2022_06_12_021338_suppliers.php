<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Suppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('Suppliers', function (Blueprint $table) {
            $table->integer('SupplierID')->autoIncrement();
            $table->string('CompanyName', 40)->nullable();
            $table->string('ContactName', 30)->nullable();
            $table->string('ContactTitle', 30)->nullable();
            $table->string('Address', 60)->nullable();
            $table->string('City', 15)->nullable();
            $table->string('Region',15)->nullable();
            $table->string('PostalCode', 10)->nullable();
            $table->string('Country', 15)->nullable();
            $table->string('Phone', 24)->nullable();
            $table->string('Fax', 24)->nullable();
            $table->mediumText('HomePage')->nullable();

            $table->index(['CompanyName', 'PostalCode']);

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
