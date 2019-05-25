<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedbiginteger('category_id')->unsigned()->nullable();
            $table->text('desc');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();

           Schema::table('guides', function (Blueprint $table) {
                  
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
        Schema::dropIfExists('guides');
    }
}
