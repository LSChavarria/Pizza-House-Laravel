<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Sucursal extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function findSucursal($id) {
        return Sucursal::findorFail($id);
    }

    public function getAllSucursales() {
        return Sucursal::all();
    }

    public function insertSucursal($request) {
        $sucursal = new Sucursal;
        $sucursal->nombre = $request->nombre;
        $sucursal->telefono = $request->telefono;
        $sucursal->direccion = $request->direccion;
        $sucursal->apertura = $request->apertura;
        $sucursal->urlMapa = $request->urlMapa;
        return $sucursal->save() ? true : false;
    }

    public function updateSucursal($request) {
        $sucursal = $this->findSucursal($request->id);
        $sucursal->nombre = $request->nombre;
        $sucursal->telefono = $request->telefono;
        $sucursal->direccion = $request->direccion;
        $sucursal->apertura = $request->apertura;
        $sucursal->urlMapa = $request->urlMapa;
        return $sucursal->save() ? true : false;
    }

    public function deleteSucursal($id) {
        return $this->findSucursal($id)->delete() ? true : false;
    }

    public function ajustes($sucursales) {
        $len = count($sucursales);
        return $len % 2 == 0 ? array('indice' => $len) : array('indice' => $len - 1);
    }

    public static function getNextApertura() {
        $sucursales = new Sucursal;
        $sucursal = null;
        $today = Carbon::now();
        foreach($sucursales->getAllSucursales() as $s){
            $diff = Carbon::parse($s->apertura)->diffInDays($today, false); 
            if(-14 < $diff && $diff < 0){
                $sucursal = $s;
                break;
            }
        }
        return $sucursal;
    }
}
