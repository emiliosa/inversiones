@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">Comisiones</div>
                    <div class="panel-body">
                        <a href="{{ route('operacion.create') }}" class="btn btn-success btn-sm" title="Agregar nueva Comisión">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>
                        {!! Form::open(['method' => 'GET', 'url' => '/operacion', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableOperaciones">
                                <thead>
                                <tr>
                                    <th class="text-center">Tipo Operacion</th>
                                    <th class="text-center">Especie</th>
                                    <th class="text-center">Fecha</th>
                                    <th class="text-center">Moneda</th>
                                    <th class="text-center">Cant. Nominales</th>
                                    <th class="text-center">Cotizacion</th>
                                    <th class="text-center" colspan="2">Comision</th>
                                    <th class="text-center" colspan="2">Derecho Mercado</th>
                                    <th class="text-center" colspan="2">IVA</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($operaciones as $item)
                                    <tr>
                                        <td class="text-center">{{ $tipoOperacion[$item->tipo_operacion] }}</td>
                                        <td class="text-center">{{ $item->especie->ticket }}</td>
                                        <td class="text-center">{{ $item->fecha }}</td>
                                        <td class="text-center">{{ $item->moneda->denominacion }}</td>
                                        <td class="text-center">{{ $item->cant_nominales }}</td>
                                        <td class="text-center">% {{ $item->cotizacion }}</td>
                                        <td class="text-center">% {{ $item->comision->porcentaje }}</td>
                                        <td class="text-center">$ {{ $item->cant_nominales * $item->cotizacion * $item->comision->porcentaje  }}</td>
                                        <td class="text-center">% {{ $item->derechoMercado->porcentaje }}</td>
                                        <td class="text-center">$ {{ $item->cant_nominales * $item->cotizacion * $item->derechoMercado->porcentaje  }}</td>
                                        <td class="text-center">% {{ $item->ivaComision->porcentaje }}</td>
                                        <td class="text-center">$ {{ $item->cant_nominales * $item->cotizacion * $item->derechoMercado->porcentaje  }}</td>
                                        <td>
                                            <a href="{{ route('operacion.show', $item->id) }}" class="btn btn-info">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
