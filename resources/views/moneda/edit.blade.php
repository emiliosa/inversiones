@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                  <div class="panel-heading">Editar moneda</div>
                    <div class="panel-body">
                        <a href="{{ route('moneda.show', $moneda->id) }}" title="Volver"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Volver</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($moneda, [
                            'method' => 'PATCH',
                            'url' => ['/moneda', $moneda->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('moneda.form', ['submitButtonText' => 'Actualizar'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
