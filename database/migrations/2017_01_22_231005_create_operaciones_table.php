<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operaciones', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo_operacion', ['Compra', 'Venta']);
            $table->integer('especie_id')->unsigned();
            $table->date('fecha');
            $table->integer('cant_nominales')->unsigned();
            $table->integer('moneda_id')->unsigned();
            $table->float('cotizacion')->unsigned();
            $table->integer('comision_banco')->unsigned();
            $table->integer('derecho_mercado')->unsigned();
            $table->integer('iva')->unsigned();

            $table->foreign('especie_id')->references('id')->on('especies');
            $table->foreign('moneda_id')->references('id')->on('monedas');
            $table->foreign('comision_banco')->references('id')->on('comisiones');
            $table->foreign('derecho_mercado')->references('id')->on('comisiones');
            $table->foreign('iva')->references('id')->on('comisiones');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('operaciones');
    }
}