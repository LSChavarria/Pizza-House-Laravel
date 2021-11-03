<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    
    protected $modelPizza;
    private $Pizza = array('id' => null, 'nombre' => null, 'precio' => null, 'ingredientes' => null, 'urlImagen' => null);

    public function __construct(Pizza $modelPizza) {
        $this->modelPizza = $modelPizza;
    }

    public function pizza() {
        $ruta = 'updatePizza';
        $rutaForm = 'admin.pizza.formPizza';
        $Pizza = $this->Pizza;
        $data = $this->modelPizza->getAllPizzas();
        return view('admin.pizza.pizzaAdmin', compact('data', 'Pizza', 'rutaForm', 'ruta'));
    }

    public function prepareInsertPizza() {
        $ruta = 'insertPizza';
        $Pizza = $this->Pizza;
        return view('admin.pizza.insertPizza', compact('Pizza', 'ruta'));
    }
    
    public function insertPizza(Request $request) {
        if($this->modelPizza->insertPizza($request))
            return back()->with('ok', 'Pizza insertada con exito');
        else
            return back()->with('error', 'Error al insertar Pizza');
    }

    public function prepareUpdatePizza(Request $request) {
        $ruta = 'updatePizza';
        $Pizza = $this->modelPizza->findPizza($request->id);
        $html = view('admin.pizza.formPizza', compact('Pizza', 'ruta'))->render();
        return response()->json(compact('html'));
    }
    
    public function updatePizza(Request $request) {
        if($this->modelPizza->updatePizza($request)) {
            $data = $this->modelPizza->getAllPizzas();
            $html = view('admin.pizza.pizzaTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else
            return back()->with('error', 'Error al actualizar Pizza');
    }

    public function deletePizza(Request $request) {
        $data = $this->modelPizza->deletePizza($request->id);
        if($data) {
            $data = $this->modelPizza->getAllPizzas();
            $html = view('admin.pizza.pizzaTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else {
            return back()->with('Mensaje_error', 'Error al eliminar el registro');
        }
    }

    public function menu() {
        $pizzas = $this->modelPizza->getAllPizzasAjuste();
        $ajustes = $this->modelPizza->ajustes($pizzas);
        return view('Client.menu', compact('pizzas', 'ajustes'));
    }

}
