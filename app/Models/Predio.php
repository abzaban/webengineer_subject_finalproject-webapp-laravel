<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Http\Persistencias\PredioPersistencia;
use App\Http\ServiciosExternos\ServicioValidacion;
use Illuminate\Support\Facades\Auth;

class Predio extends Model
{
    use SoftDeletes;
    protected $fillable = ["pred_id", "pred_organico", "pred_tamanio", "pred_tempPromedioAnual", "pred_ph", "locad_id"];
    protected $primaryKey = "pred_id";
    protected $table = 'predios';
    protected $casts = [];
    public $incrementing = false;
    public $timestamps = true;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = ['created_at','updated_at', 'deleted_at'];

    public function __construct($predios = array()) {
        parent::__construct($predios);
    }
    public static function crearPredio($datos) {
        $pred_id = PredioPersistencia::generaClave();
        $datos['pred_id'] = $pred_id;
        $datos['pred_organico'] = (strcmp($datos['pred_organico'], "1") == 0);
        $predio = new Predio($datos);
        PredioPersistencia::guardarPredio($predio);
        return $pred_id;
    }
    public static function obtenerPrediosOrganicos() {
        return self::where('pred_organico', true)->get();
    }
    public static function getPredio($pred_id) {
        return self::find($pred_id);
    }
    public function agregarCoordenada($altitud, $latitud) {
        $coordenada = new Coordenada();
        $coordenada->setAltitud($altitud);
        $coordenada->setLatitud($latitud);
        $coordenada->setPredioID($this->pred_id);
        $vertice = count($this->getCoordenadas()->get()) + 1;
        $coordenada->setVertice($vertice);
        PredioPersistencia::agregarCoordenada($coordenada);
    }
    public function getLocalidad() {
        return $this->belongsTo(Localidad::class, 'locad_id');
    }
    public function getPalmeras() {
        return $this->hasMany(Palmera::class, 'pred_id');
    }
    public function getCoordenadas() {
        return $this->hasMany(Coordenada::class, 'pred_id');
    }
    public function getID() {
        return $this->pred_id;
    }
    public function setOrganico($pred_organico) {
        $this->pred_organico = $pred_organico;
    }
    public function getOrganico() {
        return $this->pred_organico;
    }
    public function setTamanio($pred_tamanio) {
        $this->pred_tamanio = $pred_tamanio;
    }
    public function getTamanio() {
        return $this->pred_tamanio;
    }
    public function setTemperaturaPromedioAnual($pred_tempPromedioAnual) {
        $this->pred_tempPromedioAnual = $pred_tempPromedioAnual;
    }
    public function getTemperaturaPromedioAnual() {
        return $this->pred_tempPromedioAnual;
    }
    public function setPh($pred_ph) {
        $this->pred_ph = $pred_ph;
    }
    public function getPh() {
        return $this->pred_ph;
    }
    public function setLocalidadID($locad_id) {
        $this->locad_id = $locad_id;
    }
    public function getLocalidadID() {
        return $this->locad_id;
    }
}
