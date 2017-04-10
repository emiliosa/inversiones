<?php

namespace App\Http\Controllers;

use App\Comision;
use App\Especie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ComisionPorEspecie;
use Illuminate\Http\Request;
use Session;

class ComisionPorEspecieController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $comisionPorEspecie = ComisionPorEspecie::get();
        return view('comision-por-especie.index', compact('comisionPorEspecie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        /*$especie = Especie::getEspecieList();
        $comision = Comision::getComisionList();*/
        $especie = Especie::orderBy('ticket', 'asc')->lists('ticket', 'id');
        $comision = Comision::orderBy('porcentaje', 'asc')->lists('porcentaje', 'id');
        $especie->prepend('Seleccione especie');
        $comision->prepend('Seleccione comision');
        return view('comision-por-especie.create', compact('especie', 'comision'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

        $this->validate($request, [
            'especie_id' => 'required',
            'comision_id' => 'required',
            'fecha' => 'required'
        ]);

        $requestData = $request->all();

        ComisionPorEspecie::create($requestData);

        Session::flash('flash_message', 'ComisionPorEspecie added!');

        return redirect('comision-por-especie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $comisionPorEspecie = ComisionPorEspecie::findOrFail($id);

        return view('comision-por-especie.show', compact('comisionPorEspecie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $comisionPorEspecie = ComisionPorEspecie::findOrFail($id);
        /*$especie = Especie::getEspecieList();
        $comision = Comision::getComisionList();*/
        $especie = Especie::lists('ticket', 'id');
        $comision = Comision::lists('porcentaje', 'id');
        $especie->prepend('Seleccione especie');
        $especie->prepend('Seleccione comision');
        return view('comision-por-especie.edit', compact('comisionPorEspecie', 'especie', 'comision'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request) {

        $this->validate($request, [
            'especie_id' => 'required',
            'comision_id' => 'required',
            'fecha' => 'required'
        ]);

        $requestData = $request->all();

        $comisionPorEspecie = ComisionPorEspecie::findOrFail($id);
        $comisionporespecie->update($requestData);

        Session::flash('flash_message', 'ComisionPorEspecie updated!');

        return redirect('comision-por-especie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        ComisionPorEspecie::destroy($id);

        Session::flash('flash_message', 'ComisionPorEspecie deleted!');

        return redirect('comision-por-especie');
    }

}
