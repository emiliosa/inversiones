<div class="form-group {{ $errors->has('ticket') ? 'has-error' : ''}}">
    {!! Form::label('ticket', 'Ticket', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ticket', isset($especie) ? $especie->ticket : null, ['class' => 'form-control']) !!}
        {!! $errors->first('ticket', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('tipo_especie') ? 'has-error' : ''}}">
    {!! Form::label('tipo_especie', 'Tipo Especie', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('tipo_especie', @$tipoespecie, $especie->tipo_especie, ['class' => 'form-control']) !!}
        {!! $errors->first('tipo_especie', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
