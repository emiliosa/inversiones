<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model {

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
    protected $table = 'monedas';

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
    protected $fillable = ['denominacion'];

    public function operaciones(){
        return $this->hasMany('\App\Operacion');
    }

    public static function getMonedaList(){
        return \DB::table('monedas')->lists('denominacion', 'id');
    }

}
