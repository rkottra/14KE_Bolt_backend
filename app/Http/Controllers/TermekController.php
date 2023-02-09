<?php

namespace App\Http\Controllers;

use App\Models\Termek;
use App\Http\Requests\StoreTermekRequest;
use App\Http\Requests\UpdateTermekRequest;
use \stdClass;

class TermekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Termek::with('kategoria')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTermekRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTermekRequest $request)
    {
        $seged = new Termek();
        $seged->nev = $request->nev;
        $seged->leiras = $request->leiras;
        $seged->ar = $request->ar;
        $seged->kedvezmeny = $request->kedvezmeny;
        $seged->save();
        return $seged;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Termek  $termek
     * @return \Illuminate\Http\Response
     */
    public function show(Termek $termek)
    {
        return Termek::where(["id"=> $termek->id])->with('kategoria')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTermekRequest  $request
     * @param  \App\Models\Termek  $termek
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTermekRequest $request, Termek $termek)
    {
        $termek->nev = $request->nev;
        $termek->leiras = $request->leiras;
        $termek->ar = $request->ar;
        $termek->kedvezmeny = $request->kedvezmeny;
        $termek->save();
        return $termek;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Termek  $termek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Termek $termek)
    {
        return $termek->delete();
    }
}
