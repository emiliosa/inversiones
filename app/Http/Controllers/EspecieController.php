<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Especie;
use App\TipoEspecie;
use Illuminate\Http\Request;
use Session;

class EspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $especie = Especie::orderBy('ticket', 'asc')->get();
        return view('especie.index', compact('especie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tipoespecie = TipoEspecie::getTipoEspecieList();
        return view('especie.create', compact('tipoespecie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ticket' => 'required',
            'tipo_especie' => 'required'
        ]);

        $requestData = $request->all();

        Especie::create($requestData);

        Session::flash('flash_message', 'Especie added!');

        return redirect('especie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $especie = Especie::findOrFail($id);

        return view('especie.show', compact('especie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $especie = Especie::findOrFail($id);
        $tipoespecie = TipoEspecie::getTipoEspecieList();
        return view('especie.edit', compact('especie', 'tipoespecie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
            'ticket' => 'required',
            'tipo_especie' => 'required'
        ]);

        $requestData = $request->all();

        $especie = Especie::findOrFail($id);
        $especie->update($requestData);

        Session::flash('flash_message', 'Especie updated!');

        return redirect('especie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Especie::destroy($id);

        Session::flash('flash_message', 'Especie deleted!');

        return redirect('especie');
    }
}
