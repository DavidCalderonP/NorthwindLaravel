<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('Products', function (Blueprint $table) {

            $table->integer('ProductID')->autoIncrement();
            $table->string('ProductName', 40);
            $table->string('QuantityPerUnit', 20)->nullable();
            $table->integer('SupplierID')->nullable();
            $table->integer('CategoryID')->nullable();
            $table->decimal('UnitPrice', 10, 4)->nullable();
            $table->smallInteger('UnitsInStock')->default(0)->nullable();
            $table->smallInteger('UnitsOnOrder')->default(0)->nullable();
            $table->smallInteger('ReorderLevel')->default(0)->nullable();
            $table->boolean('Discontinued')->default(0);

            $table->timestamps();
            $table->softDeletes();

            $table->index('ProductName');
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
