<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VariedadDatil extends Model
{
    use SoftDeletes;
    protected $fillable = ["varied_id", "varied_nombre", "varied_precio", "varied_organica", "varied_imagen"];
    protected $primaryKey = "varied_id";
    protected $table = 'variedades_datil';
    protected $casts = [];
    public $incrementing = false;
    public $timestamps = true;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = ['created_at','updated_at', 'deleted_at'];

    public function __construct($variedades = array()) {
        parent::__construct($variedades);
    }
    public function getContenedores() {
        return $this->hasMany(Contenedor::class, 'varied_id');
    }
    public function getDisponibilidad() {
        $contenedores = $this->getContenedores()->get();
        $disponibilidad = 0;
        foreach ($contenedores as $contenedor) {
            $disponibilidad += $contenedor->getCapacidadActual();
        }
        return $disponibilidad;
    }
    public static function obtenerVariedades() {
        return self::all();
    }
    public function setID($varied_id) {
        $this->varied_id = $varied_id;
    }
    public function getID() {
        return $this->varied_id;
    }
    public function setNombre($varied_nombre) {
        $this->varied_nombre = $varied_nombre;
    }
    public function getNombre() {
        return $this->varied_nombre;
    }
    public function setPrecio($varied_precio) {
        $this->varied_precio = $varied_precio;
    }
    public function getPrecio() {
        return $this->varied_precio;
    }
    public function setOrganica($varied_organica) {
        $this->varied_organica = $varied_organica;
    }
    public function getOrganica() {
        return $this->varied_organica;
    }
    public function setRutaImagen($varied_imagen) {
        $this->varied_imagen = $varied_imagen;
    }
    public function getRutaImagen() {
        return $this->varied_imagen;
    }
}
