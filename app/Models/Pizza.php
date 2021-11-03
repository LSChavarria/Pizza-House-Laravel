<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Promocion;

class Pizza extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function findPizza($id) {
        return Pizza::findorFail($id);
    }

    public function getAllPizzas() {
        return Pizza::all();
    }

    public function getAllPromociones() {
        $promociones = new Promocion;
        return $promociones->getAllPromociones();
    }

    public function getAllPizzasAjuste() {
        $pizzas = $this->getAllPizzas();
        $promociones = $this->getAllPromociones();
        $PizzasDescuento = array();
        foreach($pizzas as $p)
            $PizzasDescuento[$p->id] = $p;
        foreach($promociones as $p) 
            $PizzasDescuento[$p->idPizza]->precio = $PizzasDescuento[$p->idPizza]->precio - ($p->tipo * $PizzasDescuento[$p->idPizza]->precio / 100);
        return $PizzasDescuento;
    }
    
    public function getIdPizzaByName($name) {
        $pizza = Pizza::where('nombre', $name)->first();
        return $pizza->id;
    }

    public function insertPizza($request) {
        $pizza = new Pizza;
        $pizza->nombre = $request->nombre;
        $pizza->precio = $request->precio;
        $pizza->ingredientes = $request->ingredientes;
        $pizza->urlImagen = $request->urlImagen;
        return $pizza->save() ? true : false;
    }

    public function updatePizza($request) {
        $pizza = $this->findPizza($request->id);
        $pizza->nombre = $request->nombre;
        $pizza->precio = $request->precio;
        $pizza->ingredientes = $request->ingredientes;
        $pizza->urlImagen = $request->urlImagen;
        return $pizza->save() ? true : false;
    }

    public function deletePizza($id) {
        return $this->findPizza($id)->delete() ? true : false;
    }

    public function ajustes($pizzas) {
        $faltantes = 0;
        $len = count($pizzas);
        if($len % 3 != 0)
            $faltantes = ($len + 1) % 3 == 0 ? 1 : 2;
        if($faltantes == 1)
            return array("indice" => $len - 2, "imagenes" => ["imagenes/Pizzas/Pizza box D.png"]);
        if($faltantes == 2)
            return array("indice" => $len - 1, "imagenes" => ["imagenes/Pizzas/Pizza box I.png", "imagenes/Pizzas/Pizza box D.png"]);
        return array("indice" => $len, "imagenes" => ["imagenes/Pizzas/Pizza box D.png"]);
    }
}
