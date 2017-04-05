@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Ver moneda</div>
                <div class="panel-body">
                    <a href="{{ route('moneda.index') }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                    <a href="{{ route('moneda.edit', $moneda->id) }}" title="Edit moneda"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                    {!! Form::open([
                        'method'=>'DELETE',
                        'route' => ['moneda.destroy', $moneda->id],
                        'style' => 'display:inline'
                    ]) !!}
                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                        'type' => 'submit',
                        'class' => 'btn btn-danger btn-xs',
                        'title' => 'Eliminar moneda',
                        'onclick'=>'return confirm("Confirmar eliminación?")'
                    )) !!}
                    {!! Form::close() !!}
                    <br/>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Id</th><td>{{ $moneda->id }}</td>
                                </tr>
                                <tr>
                                    <th>Denominación</th><td>{{ $moneda->denominacion }}</td>
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
