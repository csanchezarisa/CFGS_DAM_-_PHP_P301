<?php

namespace App\Http\Controllers;

use App\Models\web;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $webs = web::all();
        return \view('weblist')->with('webs', $webs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('webinsert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try {
            $web = web::create($request->all());
            return \redirect("/web/$web->id");
        }
        catch(\Exception $e) {
            return \redirect("/web/create")->with("errorCreating", true);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\web  $web
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {

        $web;

        // Comprueba si se está pasando el parámetro ID. Sino, lo recoje de la request (Cuando se llama desde un formulario)
        if (!is_numeric($id)) {
            $id = $request['id'];
        }

        // Se busca el coche con el id querido
        $web = web::find($id);

        // Se se ha encontrado algún coche, se devuelve la vista con la info. Sino de devuelve una con un error
        if (isset($web->id)) {
            return view('web')->with('web', $web);
        }
        else {
            return view('web', ['error' => true, 'id' => $id]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\web  $web
     * @return \Illuminate\Http\Response
     */
    public function edit(web $web)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\web  $web
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, web $web)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\web  $web
     * @return \Illuminate\Http\Response
     */
    public function destroy(web $web)
    {
        //
    }
}
