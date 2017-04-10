<div class="form-group {{ $errors->has('TipoOperacion') ? 'has-error' : ''}}">
    {!! Form::label('TipoOperacion', 'TipoOperacion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('tipo_operacion', @$tipoOperacion , isset($operacion) ? $operacion->tipo_operacion : null, ['class' => 'form-control']) !!}
        {!! $errors->first('tipo_operacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

{{ $especie }}

<div class="form-group {{ $errors->has('Especie') ? 'has-error' : ''}}">
    {!! Form::label('Especie', 'Especie', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('especie_id', @$especie, isset($operacion) ? $operacion->especie_id : null, ['class' => 'form-control']) !!}
        {!! $errors->first('especie_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Fecha') ? 'has-error' : ''}}">
    {!! Form::label('Fecha', 'Fecha', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::date('fecha', isset($operacion) ? $operacion ->fecha : \Carbon\Carbon::now()) !!}
        {!! $errors->first('fecha', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Moneda') ? 'has-error' : ''}}">
    {!! Form::label('Moneda', 'Moneda', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('moneda_id', @$moneda, isset($operacion) ? $operacion->moneda_id : null, ['class' => 'form-control']) !!}
        {!! $errors->first('moneda_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('CantNominales') ? 'has-error' : ''}}">
    {!! Form::label('CantNominales', 'CantNominales', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('cant_nominales', isset($operacion) ? $operacion->cant_nominales : '0') !!}
        {!! $errors->first('cant_nominales', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Cotizacion') ? 'has-error' : ''}}">
    {!! Form::label('Cotizacion', 'Cotizacion', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('cotizacion', isset($operacion) ? $operacion->cotizacion : '0') !!}
        {!! $errors->first('cotizacion', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('Comision') ? 'has-error' : ''}}">
    {!! Form::label('comision', 'Comision', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('comision_id', @$comision, isset($operacion) ? $operacion->comision_id : null, ['class' => 'form-control']) !!}
        {!! $errors->first('comision_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('DerechoMercado') ? 'has-error' : ''}}">
    {!! Form::label('DerechoMercado', 'DerechoMercado', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('derecho_mercado', @$derechoMercado, isset($operacion) ? $operacion->derecho_mercado : null, ['class' => 'form-control']) !!}
        {!! $errors->first('derecho_mercado', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('IVA') ? 'has-error' : ''}}">
    {!! Form::label('IVA', 'IVA', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('iva', @$iva, isset($operacion) ? $operacion->iva : null, ['class' => 'form-control']) !!}
        {!! $errors->first('iva', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
