<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Categories', function (Blueprint $table) {
            $table->integer('CategoryID')->autoIncrement();
            $table->string('CategoryName', 15);
            $table->mediumText('Description')->nullable();
            $table->binary('Picture');
            $table->timestamps();
            $table->softDeletes();

            $table->index('CategoryName');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
