<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Clube;
use App\Models\PosicaoJogador;

return new class extends Migration
{
    public function up()
    {
        Schema::create('jogador', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("dataNasc");
            $table->string("clube");
            $table->string("posicao_jogador");
            $table->foreignIdFor(Clube::class);
            $table->foreignIdFor(PosicaoJogador::class);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('jogador');
    }
};
