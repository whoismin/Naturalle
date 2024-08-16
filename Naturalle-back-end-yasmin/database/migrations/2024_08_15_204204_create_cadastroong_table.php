<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cadastroong', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->string('email', 255);
            $table->string('telefone', 20);
            $table->string('cep', 10);
            $table->string('rua', 255);
            $table->string('bairro', 100);
            $table->string('cidade', 100);
            $table->string('estado', 2);
            $table->string('CNPJ', 14);
            $table->string('tipo_ong', 255)->nullable();
            $table->text('observacoes')->nullable();
            $table->timestamp('data_cadastro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadastroong');
    }
};