<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Sucursal;
use App\Models\Pizza;

class Promocion extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function findPromocion($id) {
        return Promocion::findorFail($id);
    }

    public function getAllPromociones() {
        return Promocion::all();
    }

    public function getAllPizzas() {
        $pizza = new Pizza;
        return $pizza->getAllPizzas();
    }

    public function getPizza($id) {
        $pizza = new Pizza;
        return $pizza->findPizza($id);
    }

    public function getPizzasDescuento() {
        $promociones = $this->getAllPromociones();
        $pizzas = $this->getAllPizzas();
        $disponibles = array();
        $enviar = array();
        foreach($pizzas as $pizza)
            $disponibles[$pizza->id] = true;
        foreach($promociones as $p)
            $disponibles[$p->idPizza] = false;
        foreach($pizzas as $pizza)
            if($disponibles[$pizza->id])
                $enviar[] = $pizza;
        return $enviar;
    }

    public function insertPromocion($request) {
        $promocion = new Promocion;
        $promocion->idPizza = $request->idPizza;
        $promocion->tipo = $request->tipo;
        return $promocion->save() ? true : false;
    }

    public function updatePromocion($request) {
        $promocion = $this->findPromocion($request->id);
        $promocion->idPizza = $request->idPizza;
        $promocion->tipo = $request->tipo;
        return $promocion->save() ? true : false;
    }

    public function deletePromocion($id) {
        return $this->findPromocion($id)->delete() ? true : false;
    }

    public function getNextApertura() {
        return Sucursal::getNextApertura();
    }
}
