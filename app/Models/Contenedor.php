<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Contenedor extends Model
{
    use SoftDeletes;
    protected $fillable = ["cont_id", "cont_capacidadActual", "varied_id"];
    protected $primaryKey = "cont_id";
    protected $table = 'contenedores';
    protected $casts = [];
    public $incrementing = true;
    public $timestamps = true;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = ['created_at','updated_at', 'deleted_at'];

    public function __construct($contenedores = array()) {
        parent::__construct($contenedores);
    }
    public function getVariedadDatil() {
        return $this->hasOne(VariedadDatil::class);
    }
    public function getID() {
        return $this->cont_id;
    }
    public function setCapacidadActual($cont_capacidadActual) {
        $this->cont_capacidadActual = $cont_capacidadActual;
    }
    public function getCapacidadActual() {
        return $this->cont_capacidadActual;
    }
    public function setVariedadID($varied_id) {
        $this->varied_id = $varied_id;
    }
    public function getVariedadID() {
        return $this->varied_id;
    }
}
