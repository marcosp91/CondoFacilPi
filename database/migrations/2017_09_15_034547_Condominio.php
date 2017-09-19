<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Condominio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->char('cnpj')->unique();
            $table->string('cep');
            $table->integer('endereco');
            $table->char('numero');
            $table->string('bairro');
            $table->integer('cidade');
            $table->integer('uf', $length = 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('condominio');
    }
}
