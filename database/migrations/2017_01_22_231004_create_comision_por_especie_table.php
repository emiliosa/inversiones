<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComisionPorEspecieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comision_por_especie', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('especie_id')->unsigned();
            $table->integer('comision_id')->unsigned();
            $table->date('fecha');
            $table->foreign('especie_id')->references('id')->on('especies');
            $table->foreign('comision_id')->references('id')->on('comisiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comision_por_especie');
    }
}
