<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasMenoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_menores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dependencia_id')->unsigned();
            $table->date('fecha');
            $table->string('folio')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        Schema::create('partidas_compras_menores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compra_menor_id')->unsigned();
            $table->text('descripcion');
            $table->double('cantidad_solicitada');
            $table->double('cantidad_autorizada')->nullable();
            $table->timestamps();
        });

        Schema::create('proveedores_compras_menores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('compra_menor_id')->unsigned();
            $table->integer('proveedor_id')->unsigned();
            $table->integer('seleccionado')->nullable();
            $table->timestamps();
        });
        
        Schema::create('cotizaciones_compras_menores', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('partida_id')->unsigned()->nullable();
            $table->integer('proveedor_id')->unsigned()->nullable();
            $table->text('precio_unitario')->nullable();
            $table->double('total')->nullable();
            $table->double('seleccionado')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras_menores');
        Schema::dropIfExists('partidas_compras_menores');
        Schema::dropIfExists('proveedores_compras_menores');
        Schema::dropIfExists('cotizaciones_compras_menores');
    }
}
