<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LineaDeVenta extends Model
{
    protected $fillable = ["vent_folio", "varied_id", "lineavta_precio", "lineavta_cantidad"];
    protected $primaryKey = array('vent_folio', 'varied_id');
    protected $table = 'lineas_de_venta';
    protected $casts = [];
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = [];

    public function __construct($lineasDeVenta = array()) {
        parent::__construct($lineasDeVenta);
    }
    public function getVariedadDatil() {
        return $this->hasOne(VariedadDatil::class);
    }
    public function getFolio() {
        return $this->vent_folio;
    }
    public function setVariedadID($varied_id) {
        $this->varied_id = $varied_id;
    }
    public function getVariedadID() {
        return $this->varied_id;
    }
    public function setPrecio($lineavta_precio) {
        $this->lineavta_precio = $lineavta_precio;
    }
    public function getPrecio() {
        return $this->lineavta_precio;
    }
    public function setCantidad($lineavta_cantidad) {
        $this->lineavta_cantidad = $lineavta_cantidad;
    }
    public function getCantidad() {
        return $this->lineavta_cantidad;
    }
}
