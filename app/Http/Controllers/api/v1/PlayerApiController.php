<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Players;
use App\Models\Boot;
use App\Http\Resources\PlayerResource;

class PlayerApiController extends Controller
{
    /**
    * @return \Illuminate\Http\Response
    */
    function index() {
        return Players::all();
    }

    /**
    * @return \Illuminate\Http\Response
    * @param  \App\Players  $player
    */
    function show(Players $player) {
        return response()->json($player, 200);
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
        $player = Players::create($request->all());
        
        return response()->json([
            'message' => 'Created player',
            'player' => [$player]
        ], 200);
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
    function update(Request $request, Players $player) {
        $player->update($request->all());

        return response()->json([
            'message' => 'Player updated',
            'player' => [$player]
        ], 200);
    }

    /**
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Players  $player
    * @return \Illuminate\Http\Response
    */
    function destroy(Players $player) {
        $player->delete();

        return response()->json([
            'message' => 'Player deleted',
            'player' => [$player]
        ], 200);
    }
}
