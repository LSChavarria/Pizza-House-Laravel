<?php

namespace App\Http\Controllers;

use App\Models\Promocion;
use Illuminate\Http\Request;

class PromocionController extends Controller
{
    
    protected $modelPromocion;
    private $Promocion = array('id' => null, 'idPizza' => null, 'tipo' => null);

    public function __construct(Promocion $modelPromocion) {
        $this->modelPromocion = $modelPromocion;
    }

    public function promocion() {
        $ruta = 'updatePromocion';
        $rutaForm = 'admin.promocion.formPromocion';
        $Promocion = $this->Promocion;
        $data = $this->modelPromocion->getAllPromociones();
        $pizzas = $this->modelPromocion->getPizzasDescuento();
        $selectedId = $pizzas[0]->idPizza;
        return view('admin.promocion.promocionAdmin', compact('data', 'Promocion', 'rutaForm', 'ruta', 'pizzas', 'selectedId'));
    }

    public function prepareInsertPromocion() {
        $ruta = 'insertPromocion';
        $Promocion = $this->Promocion;
        $pizzas = $this->modelPromocion->getPizzasDescuento();
        $selectedId = $pizzas[0]->idPizza;
        return view('admin.promocion.insertPromocion', compact('Promocion', 'ruta', 'pizzas', 'selectedId'));
    }
    
    public function insertPromocion(Request $request) {
        if($this->modelPromocion->insertPromocion($request))
            return back()->with('ok', 'Promocion insertada con exito');
        else
            return back()->with('error', 'Error al insertar Promocion');
    }

    public function prepareUpdatePromocion(Request $request) {
        $ruta = 'updatePromocion';
        $Promocion = $this->modelPromocion->findPromocion($request->id);
        $pizzas = $this->modelPromocion->getPizzasDescuento();
        $pizzas[] = $this->modelPromocion->getPizza($request->idPizza);
        $selectedId = $Promocion->idPizza;
        $html = view('admin.promocion.formPromocion', compact('Promocion', 'ruta', 'pizzas', 'selectedId'))->render();
        return response()->json(compact('html'));
    }
    
    public function updatePromocion(Request $request) {
        if($this->modelPromocion->updatePromocion($request)) {
            $data = $this->modelPromocion->getAllPromociones();
            $html = view('admin.promocion.promocionTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else
            return back()->with('error', 'Error al actualizar Promocion');
    }

    public function deletePromocion(Request $request) {
        $data = $this->modelPromocion->deletePromocion($request->id);
        if($data) {
            $data = $this->modelPromocion->getAllPromociones();
            $html = view('admin.promocion.promocionTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else {
            return back()->with('Mensaje_error', 'Error al eliminar el registro');
        }
    }

    public function promociones() {
        $sucursal = $this->modelPromocion->getNextApertura();
        return view('Client.promocion', compact('sucursal'));
    }

}
