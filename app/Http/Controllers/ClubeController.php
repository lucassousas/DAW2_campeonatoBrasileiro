<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Clube;

class ClubeController extends Controller
{
    public function listaClubes() {
    
        return DB::table("clube AS c")
            ->leftJoin("jogador AS j", "c.id", "=", "j.clube_id")
            ->select("c.id", "c.nome", DB::raw("COUNT(j.id) AS total_jogadores"))
            ->groupBy("c.id", "c.nome")
            ->get();
    }

    public function index()
    {
        $clube = new Clube();
        $clubes = Clube::All();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
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
            $clube = Clube::Find($request->get("id"));
        } else {
            $clube = new Clube();
        }

        $clube->nome = $request->get("nome");
        $clube->escudo = $request->get("escudo");

        $clube->save();

        return redirect("/clube");

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
        $clube = Clube::Find($id);
        $clubes = Clube::All();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
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
        Clube::destroy($id);
        return redirect("/clube");
    }
}
