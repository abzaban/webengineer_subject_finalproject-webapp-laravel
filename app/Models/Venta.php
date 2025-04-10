<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Http\Persistencias\VentaPersistencia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Venta extends Model
{
    use SoftDeletes;
    protected $fillable = ["vent_folio", "usu_id", "vent_fecha"];
    protected $primaryKey = "vent_folio";
    protected $table = 'ventas';
    protected $casts = [];
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];
    protected $hidden = [];
    private $ventaPersistencia;
    private $lineasDeVenta = array();

    public function __construct($venta = array()) {
        parent::__construct($venta);
        $this->ventaPersistencia = new VentaPersistencia();
    }
    public function getUsuario() {
        return $this->hasOne(User::class);
    }
    public function getLineasDeVenta() {
        return $this->hasMany(LineaDeVenta::class);
    }
    public function hacerLineasDeVenta($carrito) {
        $this->vent_folio = $this->ventaPersistencia->generaFolio();
        $this->usu_id = Auth::user()->id;
        $this->vent_fecha = date('Y-m-d h:i:s a', time());
        foreach ($carrito as $articulo) {
            $datosVenta['varied_id'] = $articulo->getVariedadID();
            $datosVenta['lineavta_precio'] = $articulo->getVariedadDatil()->get()[0]->getPrecio();
            $datosVenta['lineavta_cantidad'] = $articulo->getCantidad();
            $datosVenta['vent_folio'] = $this->vent_folio;
            $aux = new LineaDeVenta($datosVenta);
            $this->lineasDeVenta[] = $aux;
            DB::table('articulos_carrito')->where('usu_id', $articulo->getUsuarioID())->where('varied_id', $articulo->getVariedadID())->delete();
        }
        $this->ventaPersistencia->guardarVenta($this->lineasDeVenta, $this);
    }
    public function setFolio($vent_folio) {
        $this->vent_folio = $vent_folio;
    }
    public function getFolio() {
        return $this->vent_folio;
    }
    public function setUsuarioID($usu_id) {
        $this->usu_id = $usu_id;
    }
    public function getUsuarioID() {
        return $this->usu_id;
    }
    public function setFecha($vent_fecha) {
        $this->vent_fecha = $vent_fecha;
    }
    public function getFecha() {
        return $this->vent_fecha;
    }
}
