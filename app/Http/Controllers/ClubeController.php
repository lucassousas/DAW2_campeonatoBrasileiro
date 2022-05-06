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
        $clubes = $this->listaClubes();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
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
            "escudo" => "required|max:100"
        ], [
            "nome.required" => "O campo nome é obrigatório",
            "nome.max" => "O campo nome aceita no máximo :max caracteres",
            "nome.required" => "O campo escudo é obrigatório",
        ]);

        if($request->get("id") != ""){
            $clube = Clube::Find($request->get("id"));
        } else {
            $clube = new Clube();
        }

        $clube->nome = $request->get("nome");
        $clube->escudo = $request->get("escudo");

        if($request->file("escudo") != null){
            $clube->escudo = $request->file("escudo")->store("public/escudo");
        }

        $clube->save();

        $request->session()->flash("status", "salvo");

        return redirect("/clube");

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $clube = Clube::Find($id);
        $clubes = Clube::All();
        return view("clube.index", [
            "clube" => $clube,
            "clubes" => $clubes
        ]);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Clube::destroy($id);
        return redirect("/clube");
    }
}
