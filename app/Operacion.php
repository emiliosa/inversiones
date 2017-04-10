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
    protected $fillable = ['tipo_operacion', 'especie_id', 'fecha', 'cant_nominales', 'moneda_id', 'cotizacion', 'comision_id', 'derecho_mercado', 'iva'];

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

    public static function tipoOperacion(){
        return array('Compra','Venta');
    }
}
