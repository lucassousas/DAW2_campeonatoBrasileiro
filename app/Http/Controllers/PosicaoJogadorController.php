<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PosicaoJogador;

class PosicaoJogadorController extends Controller
{
    public function index()
    {
        $posicao_jogador = new PosicaoJogador();
        $posicao_jogadores = PosicaoJogador::All();
        return view("posicaoJogador.index", [
            "posicao_jogador" => $posicao_jogador,
            "posicao_jogadores" => $posicao_jogadores
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        return redirect("/posicaoJogador");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posicao_jogador = PosicaoJogador::Find($id);
        $posicao_jogadores = PosicaoJogador::All();
        return view("posicaoJogador.index", [
            "posicao_jogador" => $posicao_jogador,
            "posicao_jogadores" => $posicao_jogadores
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PosicaoJogador::destroy($id);
        return redirect("/posicaoJogador");
    }
}
