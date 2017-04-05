<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TipoEspecie;
use Illuminate\Http\Request;
use Session;

class TipoEspecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $tipoespecie = TipoEspecie::orderBy('denominacion', 'asc')->get();
        return view('tipo-especie.index', compact('tipoespecie'));
        /*
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $tipoespecie = TipoEspecie::where('Id', 'LIKE', "%$keyword%")
                ->orWhere('Denominación', 'LIKE', "%$keyword%")

                ->paginate($perPage);
        } else {
            $tipoespecie = TipoEspecie::paginate($perPage);
        }

        return view('tipo-especie.index', compact('tipoespecie'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tipo-especie.create');
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
            'denominacion' => 'required'
        ]);

        $requestData = $request->all();

        TipoEspecie::create($requestData);

        Session::flash('flash_message', 'TipoEspecie added!');

        return redirect('tipo-especie');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $denominacion
     *
     * @return \Illuminate\View\View
     */
    public function show($denominacion)
    {
        $tipoespecie = TipoEspecie::findOrFail($denominacion);
        return view('tipo-especie.show', compact('tipoespecie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $denominacion
     *
     * @return \Illuminate\View\View
     */
    public function edit($denominacion)
    {
        $tipoespecie = TipoEspecie::findOrFail($denominacion);
        return view('tipo-especie.edit', compact('tipoespecie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  string  $denominacion
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($denominacion, Request $request)
    {
        $this->validate($request, [
            'denominacion' => 'required'
        ]);

        $requestData = $request->all();

        $tipoespecie = TipoEspecie::findOrFail($denominacion);
        $tipoespecie->update($requestData);

        //Session::flash('flash_message', 'TipoEspecie updated!');

        return redirect()->route('tipo-especie.index')->with('success', 'Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $denominacion
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($denominacion)
    {
        TipoEspecie::destroy($denominacion);

        Session::flash('flash_message', 'TipoEspecie deleted!');

        return redirect('tipo-especie');
    }
}
