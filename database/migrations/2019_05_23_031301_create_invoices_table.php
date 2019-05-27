<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedbiginteger('user_id')->unsigned()->nullable();
            $table->unsignedbiginteger('kes_id')->unsigned()->nullable();
            $table->timestamps();
        });

          Schema::enableForeignKeyConstraints();

           Schema::table('invoices', function (Blueprint $table) {
                  
                      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
                      $table->foreign('kes_id')->references('id')->on('kes')->onDelete('cascade');

 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
