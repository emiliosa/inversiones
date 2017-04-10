<div class="form-group {{ $errors->has('Especie') ? 'has-error' : ''}}">
    {!! Form::label('Especie', 'Especie', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('especie_id', @$especie, isset($comisionPorEspecie) ? $comisionPorEspecie->especie_id : null, ['class' => 'form-control']) !!}
        {!! $errors->first('especie_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Comision') ? 'has-error' : ''}}">
    {!! Form::label('comision', 'Comision', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('especie_id', @$comision, isset($comisionPorEspecie) ? $comisionPorEspecie->comision_id : null, ['class' => 'form-control']) !!}
        {!! $errors->first('comision_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
