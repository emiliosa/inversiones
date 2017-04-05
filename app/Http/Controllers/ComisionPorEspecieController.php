<?php

namespace App\Http\Controllers;

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
        $comisionPorEspecie = Comision::orderBy('porcentaje', 'asc')->get();
        return view('comision-por-especie.index', compact('comisionPorEspecie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('comision-por-especie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request) {

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
        $comisionporespecie = ComisionPorEspecie::findOrFail($id);

        return view('comision-por-especie.show', compact('comisionporespecie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $comisionporespecie = ComisionPorEspecie::findOrFail($id);

        return view('comision-por-especie.edit', compact('comisionporespecie'));
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

        $requestData = $request->all();

        $comisionporespecie = ComisionPorEspecie::findOrFail($id);
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
