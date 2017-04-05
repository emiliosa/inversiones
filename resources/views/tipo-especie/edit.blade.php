@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                  <div class="panel-heading">Editar tipo de especie</div>
                    <div class="panel-body">
                        <a href="{{ route('tipo-especie.show', $tipoespecie->denominacion) }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($tipoespecie, [
                            'method' => 'PATCH',
                            'url' => ['/tipo-especie', $tipoespecie->denominacion],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('tipo-especie.form', ['submitButtonText' => 'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
