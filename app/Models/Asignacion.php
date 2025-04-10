<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $fillable = ["palm_id", "act_id", "asig_fechaProgramada", "asig_fechaRealizacion", "usu_id", "asig_costo"];
    protected $primaryKey = array('palm_id', 'act_id', 'asig_fechaProgramada');
    protected $table = 'asignaciones';
    protected $casts = [];
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = [];

    public function __construct($asignaciones = array()) {
        parent::__construct($asignaciones);
    }
    public function getPalmera() {
        return $this->belongsTo(Palmera::class, 'palm_id');
    }
    public function getActividad() {
        return $this->belongsTo(Actividad::class, 'act_id');
    }
    public function getUsuario() {
        return $this->hasOne(User::class);
    }
    public function setPalmeraID($palm_id) {
        $this->palm_id = $palm_id;
    }
    public function getPalmeraID() {
        return $this->palm_id;
    }
    public function setActividadID($act_id) {
        $this->act_id = $act_id;
    }
    public function getActividadID() {
        return $this->act_id;
    }
    public function setFechaProgramada($asig_fechaProgramada) {
        $this->asig_fechaProgramada = $asig_fechaProgramada;
    }
    public function getFechaProgramada() {
        return $this->asig_fechaProgramada;
    }
    public function setFechaRealizacion($asig_fechaRealizacion) {
        $this->asig_fechaRealizacion = $asig_fechaRealizacion;
    }
    public function getFechaRealizacion() {
        return $this->asig_fechaRealizacion;
    }
    public function setUsuarioID($usu_id) {
        $this->usu_id = $usu_id;
    }
    public function getUsuarioID() {
        return $this->usu_id;
    }
    public function setActividad($asig_costo) {
        $this->asig_costo = $asig_costo;
    }
    public function getCosto() {
        return $this->asig_costo;
    }
}
