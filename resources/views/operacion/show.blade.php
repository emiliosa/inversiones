@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Ver comisión por especie</div>
                    <div class="panel-body">
                        <a href="{{ route('operacion.index') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ route('operacion.edit', $operacion->id) }}" title="Editar operación"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['operacion.destroy', $operacion->id],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar operación',
                            'onclick'=>'return confirm("Confirmar eliminación?")'
                            )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>Tipo Operación</th>
                                        <td>{{ $operacion->tipo_operacion }}</td>
                                    </tr>
                                    <tr>
                                        <th>Especie</th>
                                        <td>{{ $operacion->especie->ticket }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha</th>
                                        <td>{{ $operacion->fecha }}</td>
                                    </tr>
                                    <tr>
                                        <th>Moneda</th>
                                        <td>{{ $operacion->moneda->denominacion }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cant. Nominales</th>
                                        <td>{{ $operacion->cant_nominales }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cotización</th>
                                        <td>{{ $operacion->cotizacion }}</td>
                                    </tr>
                                    <tr>
                                        <th>Comisión</th>
                                        <td>{{ $operacion->comision->porcentaje }}</td>
                                    </tr>
                                    <tr>
                                        <th>Derecho Mercado</th>
                                        <td>{{ $operacion->derechoMercado->porcentaje }}</td>
                                    </tr>
                                    <tr>
                                        <th>IVA</th>
                                        <td>{{ $operacion->ivaComision->porcentaje }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
