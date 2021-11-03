<?php

namespace App\Http\Controllers;

use App\Models\Orden;
use Illuminate\Http\Request;

class OrdenController extends Controller
{
    
    protected $modelOrden;
    private $Orden = array('id' => null, 'idPizza' => null, 'idCliente' => null, 'nombre' => null, 'direccion' => null, 'referencia' => null);

    public function __construct(Orden $modelOrden) {
        $this->modelOrden = $modelOrden;
    }

    public function orden() {
        $ruta = 'updateOrden';
        $rutaForm = 'admin.orden.formOrden';
        $Orden = $this->Orden;
        $data = $this->modelOrden->getAllOrdenes();
        return view('admin.orden.ordenAdmin', compact('data', 'Orden', 'rutaForm', 'ruta'));
    }

    public function prepareInsertOrden() {
        $ruta ='insertOrden';
        $Orden = $this->Orden;
        return view('admin.orden.insertOrden', compact('Orden', 'ruta'));
    }
    
    public function insertOrden(Request $request) {
        if($this->modelOrden->insertOrden($request))
            return back()->with('ok', 'Orden insertada con exito');
        else
            return back()->with('error', 'Error al insertar Orden');
    }

    public function prepareUpdateOrden(Request $request) {
        $ruta = 'updateOrden';
        $Orden = $this->modelOrden->findOrden($request->id);
        $html = view('admin.orden.formOrden', compact('Orden', 'ruta'))->render();
        return response()->json(compact('html'));
    }
    
    public function updateOrden(Request $request) {
        if($this->modelOrden->updateOrden($request)) {
            $data = $this->modelOrden->getAllOrdenes();
            $html = view('admin.orden.ordenTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else
            return back()->with('error', 'Error al actualizar Orden');
    }

    public function deleteOrden(Request $request) {
        $data = $this->modelOrden->deleteOrden($request->id);
        if($data) {
            $data = $this->modelOrden->getAllOrdenes();
            $html = view('admin.orden.ordenTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else {
            return back()->with('Mensaje_error', 'Error al eliminar el registro');
        }
    }

    public function ordenar() {
        $pizzas = $this->modelOrden->getAllPizzas();
        $pedidos = [];
        return view('Client.ordenar.ordenar', compact('pizzas', 'pedidos'));
    }

    public function agregarOrden(Request $request) {
        $pedidos = [];
        $pedidos[] = $request->pedido;
        //agregar a una lista existente y modificarla bd
        //obtener las pizzas de los id y acomodar el html
        $html = view('Client.ordenar.listaPedidos', compact('pedidos'))->render();
        return response()->json(compact('html'));
    }

    public function generarOrden(Request $request) {
        dd($request->all());
        return $this->insertOrden($request);
    }

}
