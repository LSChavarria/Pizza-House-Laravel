<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Pizza;

class Orden extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function findOrden($id) {
        return Orden::findorFail($id);
    }

    public function getAllOrdenes() {
        return Orden::all();
    }

    public function getAllPizzas() {
        $pizza = new Pizza;
        return $pizza->getAllPizzas();
    }

    public function insertOrden($request) {
        $orden = new Orden;
        $orden->idCliente = $request->idCliente;
        $orden->nombre = $request->nombre;
        $orden->direccion = $request->direccion;
        $orden->referencia = $request->referencia;
        $orden->idPizza = $request->idPizza;
        return $orden->save() ? true : false;
    }

    public function updateOrden($request) {
        $orden = $this->findOrden($request->id);
        $orden->idCliente = $request->idCliente;
        $orden->nombre = $request->nombre;
        $orden->direccion = $request->direccion;
        $orden->referencia = $request->referencia;
        $orden->idPizza = $request->idPizza;
        return $orden->save() ? true : false;
    }

    public function deleteOrden($id) {
        return $this->findOrden($id)->delete() ? true : false;
    }
}
