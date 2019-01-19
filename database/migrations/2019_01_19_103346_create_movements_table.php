<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('account_id')->unsigned()->index()->nullable();
            $table->string('type')->notnull();
            $table->double('amounts')->notnull();
            $table->timestamps();
        });

        Schema::table('movements', function (Blueprint $table){
            $table->foreign('account_id')->references('accounts')->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movements');
    }
}
