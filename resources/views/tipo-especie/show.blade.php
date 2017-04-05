@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                  <div class="panel-heading">Ver tipo de especie</div>
                    <div class="panel-body">
                        <a href="{{ route('tipo-especie.index') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ route('tipo-especie.edit', $tipoespecie->denominacion) }}" title="Edit Tipo de Especie"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['tipo-especie.destroy', $tipoespecie->denominacion],
                            'style' => 'display:inline'
                            ]) !!}
                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                            'type' => 'submit',
                            'class' => 'btn btn-danger btn-xs',
                            'title' => 'Eliminar Tipo de Especie',
                            'onclick'=>'return confirm("Confirmar eliminación?")'
                            )) !!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                      <th>Denominación</th><td>{{ $tipoespecie->denominacion }}</td>
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
