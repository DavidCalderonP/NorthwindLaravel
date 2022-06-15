<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order Details', function (Blueprint $table) {
            $table->integer('OrderID');
            $table->integer('ProductID');
            $table->decimal('UnitPrice', 10, 4)->default(0);
            $table->smallInteger('Quantity')->default(1);
            $table->decimal('Discount', 8, 0)->default(0);

            $table->primary(['OrderID', 'ProductID']);

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
