<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        Schema::create('registration_ong', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('cep');
            $table->string('rua');
            $table->string('bairro');
            $table->string('cidade');
            $table->string('estado', 2);
            $table->string('CNPJ')->unique();
            $table->string('tipo_ong')->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamp('data_cadastro')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registration_ong');
    }
};
