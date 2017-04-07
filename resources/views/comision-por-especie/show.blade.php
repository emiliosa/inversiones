@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Ver comisión por especie</div>
                    <div class="panel-body">
                        <a href="{{ route('comision-por-especie.index') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <a href="{{ route('comision-por-especie.edit', $comisionPorEspecie->id) }}" title="Edit comisión"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['comision-por-especie.destroy', $comisionPorEspecie->id],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar comisión',
                            'onclick'=>'return confirm("Confirmar eliminación?")'
                            )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                <tr>
                                    <th>Id</th><td>{{ $comisionPorEspecie->id }}</td>
                                </tr>
                                <tr>
                                    <th>Especie</th><td>{{ $comisionPorEspecie->especie_id }}</td>
                                </tr>
                                <tr>
                                    <th>Comision</th><td>{{ $comisionPorEspecie->comision_id}}</td>
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
