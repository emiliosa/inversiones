@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Tipos de Especie</div>
                    <div class="panel-body">
                        <a href="{{ route('tipo-especie.create') }}" class="btn btn-success btn-sm" title="Agregar nuevo Tipo de Especie">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>
                        {!! Form::open(['method' => 'GET', 'url' => '/tipo-especie', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                            <table class="table table-bordered" id="tableTipoEspecie">
                                <thead>
                                <tr>
                                    <th class="text-center">Denominación</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tipoespecie as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->denominacion}}</td>
                                        <td>
                                            <a href="{{ route('tipo-especie.show', $item->denominacion) }}" class="btn btn-info">Ver</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
