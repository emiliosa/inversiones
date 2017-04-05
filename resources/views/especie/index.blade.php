@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Tipos de Especie</div>
                    <div class="panel-body">
                        <a href="{{ route('especie.create') }}" class="btn btn-success btn-sm" title="Agregar nueva Especie">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                        </a>
                        {!! Form::open(['method' => 'GET', 'url' => '/especie', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                            <table class="table table-bordered" id="tableEspecie">
                                <thead>
                                <tr>
                                    <th class="text-center">Ticket</th>
                                    <th class="text-center">Tipo Especie</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($especie as $item)
                                    <tr>
                                        <td class="text-center">{{ $item->ticket}}</td>
                                        <td class="text-center">{{ $item->tipo_especie}}</td>
                                        <td>
                                            <a href="{{ route('especie.show', $item->id) }}" class="btn btn-info">Ver</a>
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
