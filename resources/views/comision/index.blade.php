@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Comisiones</div>
                <div class="panel-body">
                    <a href="{{ route('comision.create') }}" class="btn btn-success btn-sm" title="Agregar nueva Comisión">
                        <i class="fa fa-plus" aria-hidden="true"></i> Agregar
                    </a>
                    {!! Form::open(['method' => 'GET', 'url' => '/comision', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
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
                        <table class="table table-bordered" id="tableComision">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">Porcentaje</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comision as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id}}</td>
                                    <td class="text-center">% {{ $item->porcentaje}}</td>
                                    <td>
                                        <a href="{{ route('comision.show', $item->id) }}" class="btn btn-info">Ver</a>
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
