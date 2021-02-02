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
        return \view('webs.weblist')->with('webs', $webs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('webs.webadd');
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
            return view('webs.web')->with('web', $web);
        }
        else {
            return view('web', ['error' => true, 'id' => $id]);
        }

    }

    public function search(Request $request) {
        $web = web::find($request['id']);
        return view('webs.web')->with('web', $web);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\web  $web
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $web = web::find($id);

        if (isset($web->id)) {
            return view('webs.webform')->with('web', $web);
        }
        else {
            return view('webs.webform', ['error' => true, 'id' => $id]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\web  $web
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $updated = true;
        $web;

        try {
            $web = web::find($id);
            $web->update($request->all());
        }
        catch(\Exception $e) {
            $updated = false;
        }

        return view("web", ['updated'=> $updated])->with('web', $web);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\web  $web
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deleted = true;

        try {
            $web = web::find($id);
            $web->delete();
        }
        catch(\Exception $e) {
            $deleted=false;
            return redirect('/')->with('not_deleted', $deleted);
        }

        return redirect('/')->with('deleted', $deleted);

    }
}
