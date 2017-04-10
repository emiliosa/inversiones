<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
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
    protected $table = 'especies';

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
    protected $fillable = ['ticket', 'tipo_especie'];

    public function operaciones(){
        return $this->hasMany('\App\Operacion');
    }

    public static function getEspecieList(){

        return \DB::table('especies')->lists('ticket', 'id');
    }
}
