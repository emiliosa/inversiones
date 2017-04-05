<div class="form-group {{ $errors->has('Denominacion') ? 'has-error' : ''}}">
    {!! Form::label('Denominacion', 'Denominacion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('denominacion', isset($moneda) ? $moneda->denominacion : null, ['class' => 'form-control']) !!}
        {!! $errors->first('denominacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
