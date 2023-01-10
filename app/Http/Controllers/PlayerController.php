<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Players;
use App\Models\Boot;

class PlayerController extends Controller
{
    /**
    * @return \Illuminate\Http\Response
    */
    function index() {
        $players = Players::all();

        return view('index', ['players' => $players]);
    }

    
    /**
    * @return \Illuminate\Http\Response
    */
    function create() {
        $boots = Boot::all();

        return view('create', ['boots' => $boots]);
    }

    /**
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    function store(Request $request) {
        $request->validate([
            'name' => 'required',
        ]);

        $player = new Players;
        $player->name = $request->name;
        $player->boots_id = $request->boots_id;

        $player->save();
        return redirect()->route('players.index')
        ->with('success','Creado');
    }

    /**
    * @param  \App\Players  $player
    * @return \Illuminate\Http\Response
    */
    public function edit(Players $player) {
        $boots = Boot::all();
        return view('edit')->with(compact('player'))->with(compact('boots', $boots));
    }

    /**
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Players  $player
    * @return \Illuminate\Http\Response
    */
    function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
        ]);

        $player = Players::find($id);
        $player->name = $request->name;
        $player->boots_id = $request->boots_id;

        $player->save();
        return redirect()->route('players.index')
        ->with('success','Creado');
    }

    /**
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Players  $player
    * @return \Illuminate\Http\Response
    */
    function destroy(Players $player) {
        $player->delete();

        return redirect()->route('players.index')
        ->with('success','Eliminado');
    }
}