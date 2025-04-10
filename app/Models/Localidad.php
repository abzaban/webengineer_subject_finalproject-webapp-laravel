<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    use SoftDeletes;
    protected $fillable = ["locad_id", "locad_nombre"];
    protected $primaryKey = "locad_id";
    protected $table = 'localidades';
    protected $casts = [];
    public $incrementing = true;
    public $timestamps = true;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = ['created_at','updated_at', 'deleted_at'];

    public function __construct($localidades = array()) {
        parent::__construct($localidades);
    }
    public static function obtenerLocalidades() {
        return self::all();
    }
    public function setID($locad_id) {
        $this->locad_id = $locad_id;
    }
    public function getID() {
        return $this->locad_id;
    }
    public function setNombre($locad_nombre) {
        $this->locad_nombre = $locad_nombre;
    }
    public function getNombre() {
        return $this->locad_nombre;
    }
}
