<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PosicaoJogador;

class PosicaoJogadorController extends Controller
{
    public function listaPosicaoJogador(){
        return DB::table("posicao_jogador AS p")
            ->join("jogador AS j", "p.id", "=", "j.posicao_jogador_id")
            ->select("p.*", "j.nome AS nome_jogador")
            ->get();
    }

    public function index()
    {
        $posicao_jogador = new PosicaoJogador();
        $posicao_jogadores = PosicaoJogador::All();
        return view("posicaoJogador.index", [
            "posicao_jogador" => $posicao_jogador,
            "posicao_jogadores" => $posicao_jogadores
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if($request->get("id") != ""){
            $posicao_jogador = PosicaoJogador::Find($request->get("id"));
        } else {
            $posicao_jogador = new PosicaoJogador();
        }

        $posicao_jogador->posicao = $request->get("posicao");
        $posicao_jogador->descricao = $request->get("descricao");

        $posicao_jogador->save();

        $request->session()->flash("status", "salvo");

        return redirect("/posicaoJogador");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $posicao_jogador = PosicaoJogador::Find($id);
        $posicao_jogadores = $this->listaPosicaoJogador();
        return view("posicaoJogador.index", [
            "posicao_jogador" => $posicao_jogador,
            "posicao_jogadores" => $posicao_jogadores
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        PosicaoJogador::destroy($id);
        return redirect("/posicaoJogador");
    }
}
