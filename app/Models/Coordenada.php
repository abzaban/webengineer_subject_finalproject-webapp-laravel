<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Coordenada extends Model
{
    use SoftDeletes;
    protected $fillable = ["pred_id", "coord_vertice", "coord_latitud", "coord_altitud"];
    protected $primaryKey = array('pred_id', 'coord_vertice');
    protected $table = 'coordenadas';
    protected $casts = [];
    public $incrementing = false;
    public $timestamps = true;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = ['created_at','updated_at', 'deleted_at'];

    public function __construct($coordenadas = array()) {
        parent::__construct($coordenadas);
    }
    public function setPredioID($pred_id) {
        $this->pred_id = $pred_id;
    }
    public function getPredioID() {
        return $this->pred_id;
    }
    public function setVertice($coord_vertice) {
        $this->coord_vertice = $coord_vertice;
    }
    public function getVertice() {
        return $this->coord_vertice;
    }
    public function setLatitud($coord_latitud) {
        $this->coord_latitud = $coord_latitud;
    }
    public function getLatitud() {
        return $this->coord_latitud;
    }
    public function setAltitud($coord_altitud) {
        $this->coord_altitud = $coord_altitud;
    }
    public function getAltitud() {
        return $this->coord_altitud;
    }
}
