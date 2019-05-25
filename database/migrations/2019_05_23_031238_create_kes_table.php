<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedbiginteger('user_id')->unsigned()->nullable();
            $table->unsignedbiginteger('customer_id')->unsigned()->nullable();
            $table->unsignedbiginteger('category_id')->unsigned()->nullable();
            $table->integer('expenses')->null();
            $table->string('status')->null();
            $table->timestamps();
        });

          Schema::enableForeignKeyConstraints();

           Schema::table('kes', function (Blueprint $table) {
                  
                      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                      $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
                      $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kes');
    }
}
