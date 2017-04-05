<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComisionPorEspecie extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comision_por_especies';

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
    protected $fillable = ['especie_id', 'comision_id', 'fecha'];
}
