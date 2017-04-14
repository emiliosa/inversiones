<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'operaciones';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_operacion', 'especie_id', 'fecha', 'cant_nominales', 'moneda_id', 'cotizacion', 'comision_id', 'derecho_mercado', 'iva', 'contraparte_id'];

    public function operaciones(){
        return $this->hasMany('\App\Operacion');
    }

    public function especie(){
        return $this->belongsTo('\App\Especie');
    }

    public function moneda(){
        return $this->belongsTo('\App\Moneda');
    }

    public function comision(){
        return $this->belongsTo('\App\Comision');
    }

    public function derechoMercado(){
        return $this->belongsTo('\App\Comision','derecho_mercado');
    }

    public function ivaComision(){
        return $this->belongsTo('\App\Comision','iva');
    }

    public function contraparte(){
        return $this->belongsTo('\App\Operacion','contraparte_id');
    }

    public static function tipoOperacion(){
        return array('Compra','Venta');
    }

    public function setFechaAttribute($fecha){
        $this->attributes['fecha'] = \Carbon\Carbon::createFromFormat('d-m-Y', $fecha)->format('Y-m-d');
    }

    public function getFechaAttribute($fecha){
        return \Carbon\Carbon::createFromFormat('Y-m-d', $fecha)->format('d-m-Y');
    }

    public function setContraparteIdAttribute($contraparte){
        $this->attributes['contraparte_id'] = $contraparte !== '' ? $contraparte : null;
    }

    public function getContraparteIdAttribute($contraparte){
        return $contraparte;
    }
}
