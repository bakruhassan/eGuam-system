<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedbiginteger('category_id')->unsigned()->nullable();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();

        Schema::table('docs', function (Blueprint $table) {
               
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
        Schema::dropIfExists('docs');
    }
}
