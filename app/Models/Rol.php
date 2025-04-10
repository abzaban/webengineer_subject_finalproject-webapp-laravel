<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use SoftDeletes;
    protected $fillable = ["rol_id", "rol_nombre"];
    protected $primaryKey = "rol_id";
    protected $table = 'roles';
    protected $casts = [];
    public $incrementing = true;
    public $timestamps = true;
    protected $guarded = [];
    protected $hidden = [];
    protected $dates = ['created_at','updated_at', 'deleted_at'];

    public function __construct($roles = array()) {
        parent::__construct($roles);
    }
    public function setID($rol_id) {
        $this->rol_id = $rol_id;
    }
    public function getID() {
        return $this->rol_id;
    }
    public function setNombre($rol_nombre) {
        $this->rol_nombre = $rol_nombre;
    }
    public function getNombre() {
        return $this->rol_nombre;
    }
}
