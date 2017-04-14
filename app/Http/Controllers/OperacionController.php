<?php

namespace App\Http\Controllers;

use App\Comision;
use App\Especie;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Moneda;
use App\Operacion;
use Illuminate\Http\Request;
use Session;

class OperacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request){
        $tipoOperacion = Operacion::tipoOperacion();
        $operaciones = Operacion::with('especie','moneda','comision','derechoMercado','ivaComision')->get();
        return view('operacion.index', compact('operaciones','tipoOperacion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(){
        $contraparte = Operacion::lists('id');
        $tipoOperacion = Operacion::tipoOperacion();
        $especie = Especie::orderBy('ticket')->lists('ticket', 'id');
        $moneda = Moneda::lists('denominacion', 'id');
        $comision = Comision::lists('porcentaje', 'id');
        $derechoMercado = Comision::lists('porcentaje', 'id');
        $iva = Comision::lists('porcentaje', 'id');
        return view('operacion.create', compact('contraparte','tipoOperacion','especie','moneda','comision','derechoMercado','iva'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request){

        $this->validate($request, [
            'tipo_operacion' => 'required',
            'especie_id' => 'required',
            'fecha' => 'required',
            'cant_nominales' => 'required',
            'moneda_id' => 'required',
            'cotizacion' => 'required',
            'comision_id' => 'required',
            'derecho_mercado' => 'required',
            'iva' => 'required'
        ]);

        $requestData = $request->all();

        Operacion::create($requestData);

        Session::flash('flash_message', 'Operacion added!');

        return redirect('operacion');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id){

        $tipoOperacion = Operacion::tipoOperacion();
        $operacion = Operacion::with('especie','moneda','comision','derechoMercado','ivaComision')->findOrFail($id);
        return view('operacion.show', compact('operacion','tipoOperacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id){
        $operacion = Operacion::findOrFail($id);
        $contraparte = Operacion::lists('id','id');
        $tipoOperacion = Operacion::tipoOperacion();
        $especie = Especie::orderBy('ticket')->lists('ticket', 'id');
        $moneda = Moneda::lists('denominacion', 'id');
        $comision = Comision::lists('porcentaje', 'id');
        $derechoMercado = Comision::lists('porcentaje', 'id');
        $iva = Comision::lists('porcentaje', 'id');
        return view('operacion.edit', compact('operacion','contraparte','tipoOperacion','especie','moneda','comision','derechoMercado','iva'));
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
            'tipo_operacion' => 'required',
            'especie_id' => 'required',
            'fecha' => 'required',
            'cant_nominales' => 'required',
            'moneda_id' => 'required',
            'cotizacion' => 'required',
            'comision_id' => 'required',
            'derecho_mercado' => 'required',
            'iva' => 'required'
        ]);

        $requestData = $request->all();

        $operacion = Operacion::findOrFail($id);
        $operacion->update($requestData);

        Session::flash('flash_message', 'Operacion updated!');

        return redirect('operacion');
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
        Operacion::destroy($id);

        Session::flash('flash_message', 'Operacion deleted!');

        return redirect('operacion');
    }
}
