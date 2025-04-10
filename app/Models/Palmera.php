<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Palmera extends Model
{
    use SoftDeletes;
    protected $fillable = ["palm_id", "palm_altura", "palm_ancho", "palm_horasLuzAnio", "palm_aspectoHojas", "pred_id", "varied_id"];
    protected $primaryKey = "palm_id";
    protected $table = 'palmeras';
    protected $casts = [];
    public $incrementing = false;
    public $timestamps = true;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = ['created_at','updated_at', 'deleted_at'];

    public function __construct($palmeras = array()) {
        parent::__construct($palmeras);
    }
    public static function obtenerPalmerasOrganicas() {
        $palmeras = Palmera::all();
        return $palmeras->filter(function($palmera) {
            return $palmera->getVariedadDatil()->get()[0]->getOrganica() == 1 && $palmera->getPredio()->get()[0]->getOrganico() == 0;
        });
    }
    public function getVariedadDatil() {
        return $this->belongsTo(VariedadDatil::class, 'varied_id');
    }
    public function getPredio() {
        return $this->belongsTo(Predio::class, 'pred_id');
    }
    public function getID() {
        return $this->palm_id;
    }
    public function setAltura($palm_altura) {
        $this->palm_altura = $palm_altura;
    }
    public function getAltura() {
        return $this->palm_altura;
    }
    public function setAncho($palm_ancho) {
        $this->palm_ancho = $palm_ancho;
    }
    public function getAncho() {
        return $this->palm_ancho;
    }
    public function setHorasLuzAnio($palm_horasLuzAnio) {
        $this->palm_horasLuzAnio = $palm_horasLuzAnio;
    }
    public function getHorasLuzAnio() {
        return $this->palm_horasLuzAnio;
    }
    public function setAspectoHojas($palm_aspectoHojas) {
        $this->palm_aspectoHojas = $palm_aspectoHojas;
    }
    public function getAspectoHojas() {
        return $this->palm_aspectoHojas;
    }
    public function setPredioID($pred_id) {
        $this->pred_id = $pred_id;
    }
    public function getPredioID() {
        return $this->pred_id;
    }
}
