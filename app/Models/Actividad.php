<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use SoftDeletes;
    protected $fillable = ["act_id", "act_nombre", "act_descripcion", "act_costo", "act_aptaOrganica"];
    protected $primaryKey = "act_id";
    protected $table = 'actividades';
    protected $casts = [];
    public $incrementing = true;
    public $timestamps = true;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = ['created_at','updated_at', 'deleted_at'];

    public function __construct($actividad = array()) {
        parent::__construct($actividad);
    }
    public function getID() {
        return $this->act_id;
    }
    public function setNombre($act_nombre) {
        $this->act_nombre = $act_nombre;
    }
    public function getNombre() {
        return $this->act_nombre;
    }
    public function setDescripcion($act_descripcion) {
        $this->act_descripcion = $act_descripcion;
    }
    public function getDescripcion() {
        return $this->act_descripcion;
    }
    public function setCosto($act_costo) {
        $this->act_costo = $act_costo;
    }
    public function getCosto() {
        return $this->act_costo;
    }
    public function setAptaOrganica($act_aptaOrganica) {
        $this->act_aptaOrganica = $act_aptaOrganica;
    }
    public function getAptaOrganica() {
        return $this->act_aptaOrganica;
    }
}
