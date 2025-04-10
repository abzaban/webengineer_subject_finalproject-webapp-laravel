<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticuloCarrito extends Model
{
    protected $fillable = ["usu_id", "varied_id", "car_cantidad"];
    protected $primaryKey = array('usu_id', 'varied_id');
    protected $table = 'articulos_carrito';
    protected $casts = [];
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = [];

    public function __construct($articuloCarrito = array()) {
        parent::__construct($articuloCarrito);
    }


    public function getSubTotal(){
        return $this->car_cantidad * $this->getVariedadDatil()->get()[0]->getPrecio();
    }
    public function getUsuario() {
        return $this->belongsTo(User::class, 'id');
    }
    public function getVariedadDatil() {
        return $this->belongsTo(VariedadDatil::class, 'varied_id');
    }
    public function setUsuarioID($usu_id) {
        $this->usu_id = $usu_id;
    }
    public function getUsuarioID() {
        return $this->usu_id;
    }
    public function setVariedadID($varied_id) {
        $this->varied_id = $varied_id;
    }
    public function getVariedadID() {
        return $this->varied_id;
    }
    public function setCantidad($car_cantidad) {
        $this->car_cantidad = $car_cantidad;
    }
    public function getCantidad() {
        return $this->car_cantidad;
    }
}
