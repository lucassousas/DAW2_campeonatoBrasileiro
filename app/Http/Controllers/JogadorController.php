<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Jogador;
use App\Models\Clube;
use App\Models\PosicaoJogador;

class JogadorController extends Controller
{
    public function index()
    {
        $jogador = new Jogador();
        $jogadores = Jogador::All();
        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadores" => $jogadores
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
            $jogador = Jogador::Find($request->get("id"));
        } else {
            $jogador = new Jogador();
        }

        $jogador->nome = $request->get("nome");
        $jogador->dataNasc = $request->get("dataNasc");
        $jogador->clube_id = $request->get("clube_id");
        $jogador->posicao_jogador_id = $request->get("posicao_jogador_id");

        $jogador->save();

        return redirect("/jogador");
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
        $jogador = Jogador::Find($id);
        $jogadores = Jogador::All();
        return view("jogador.index", [
            "jogador" => $jogador,
            "jogadores" => $jogadores
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
        Jogador::destroy($id);
        return redirect("/jogador");
    }
}
