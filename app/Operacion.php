<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'operacions';

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
    protected $fillable = ['tipo_operacion', 'especie_id', 'fecha', 'cant_nominales', 'moneda_id', 'cotizacion', 'comision_banco', 'derecho_mercado', 'iva'];
}
