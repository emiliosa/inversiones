<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEspecie extends Model
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
    protected $table = 'tipo_especie';

    /**
     * The database primary key value.
     *
     * @var string
     */
    protected $primaryKey = 'denominacion';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['denominacion'];

    public static function getTipoEspecieList(){
        return \DB::table('tipo_especie')->lists('denominacion', 'denominacion');
    }
}
