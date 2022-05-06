<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jogador;
use App\Models\Clube;
use App\Models\PosicaoJogador;

class JogadorController extends Controller
{
    public function listaJogador()
    {
        return DB::table("jogador AS j")
            ->leftJoin("clube AS c", "j.clube_id", "=", "c.id")
            ->leftJoin("posicao_jogador AS p", "j.posicao_jogador_id", "=", "p.id")
            ->select("j.id", "j.nome", DB::raw("COUNT(p.id) AS total_jogadores"))
            ->groupBy("j.id", "j.nome")
            ->get();
    }

    public function index()
    {
        $jogador = new Jogador();
        $jogadores = $this->listaJogador();
        $clubes = Clube::All();
        $posicao_jogadores = PosicaoJogador::All();
        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadores" => $jogadores,
            "clubes" => $clubes,
            "posicao_jogadores" => $posicao_jogadores
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            "nome" => "required|max:100",
            "dataNasc" => "required",
            "clube" => "required",
            "posicao" => "required"
        ], [
            "nome.required" => "O campo nome é obrigatório",
            "nome.max" => "O campo nome aceita no máximo :max caracteres",
            "dataNasc.required" => "O campo data de nascimento é obrigatório",
            "clube.required" => "O campo escudo é obrigatório",
            "posicao.required" => "O campo posição do jogador é obrigatório"
        ]);

        if($request->get("id") != ""){
            $jogador = Jogador::Find($request->get("id"));
        } else {
            $jogador = new Jogador();
        }

        $jogador->nome = $request->get("nome");
        $jogador->dataNasc = $request->get("dataNasc");
        $jogador->clube_id = $request->get("clube_id");
        $jogador->posicao_jogador_id = $request->get("posicao_jogador_id");

        $jogador->save();

        $request->session()->flash("status", "salvo");

        return redirect("/jogador");
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $jogador = Jogador::Find($id);
        $jogadores = Jogador::All();
        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadores" => $jogadores
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Jogador::destroy($id);
        return redirect("/jogador");
    }
}
