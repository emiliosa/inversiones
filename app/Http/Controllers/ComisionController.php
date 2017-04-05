<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Comision;
use Illuminate\Http\Request;
use Session;

class ComisionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request) {
        $comision = Comision::orderBy('porcentaje', 'asc')->get();
        return view('comision.index', compact('comision'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('comision.create');
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
            'porcentaje' => 'required'
        ]);

        $requestData = $request->all();

        Comision::create($requestData);

        Session::flash('flash_message', 'Comision added!');

        return redirect('comision');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id) {
        $comision = Comision::findOrFail($id);

        return view('comision.show', compact('comision'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id) {
        $comision = Comision::findOrFail($id);

        return view('comision.edit', compact('comision'));
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
            'porcentaje' => 'required'
        ]);
        $requestData = $request->all();

        $comision = Comision::findOrFail($id);
        $comision->update($requestData);

        Session::flash('flash_message', 'Comision updated!');

        return redirect('comision');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id) {
        Comision::destroy($id);

        Session::flash('flash_message', 'Comision deleted!');

        return redirect('comision');
    }

}
