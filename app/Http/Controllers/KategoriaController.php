<?php

namespace App\Http\Controllers;

use App\Models\Kategoria;
use App\Http\Requests\StoreKategoriaRequest;
use App\Http\Requests\UpdateKategoriaRequest;

class KategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Kategoria::all();
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategoria  $kategoria
     * @return \Illuminate\Http\Response
     */
    public function show(Kategoria $kategoria)
    {
        //
    }

}
