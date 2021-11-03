<?php

namespace App\Http\Controllers;

use App\Models\MensajeCliente;
use Illuminate\Http\Request;

class MensajeClienteController extends Controller
{
    
    protected $modelMensajeCliente;
    private $Mensaje = array('id' => null, 'idCliente'=>null, 'mensaje'=>null);

    public function __construct(MensajeCliente $modelMensajeCliente) {
        $this->modelMensajeCliente = $modelMensajeCliente;
    }
    
    public function mensaje_cliente() {
        $ruta = 'updateMensajeCliente';
        $rutaForm = 'admin.mensaje.formMensajeCliente';
        $MensajeCliente = $this->Mensaje;
        $data = $this->modelMensajeCliente->getAllMensajesClientes();
        return view('admin.mensaje.mensajeAdmin', compact('data', 'MensajeCliente', 'rutaForm', 'ruta'));
    }

    public function prepareInsertMensajeCliente() {
        $ruta = 'insertMensajeCliente';
        $MensajeCliente = $this->Mensaje;
        return view('admin.mensaje.insertMensajeCliente', compact('MensajeCliente', 'ruta'));
    }
    
    public function insertMensajeCliente(Request $request) {
        if($this->modelMensajeCliente->insertMensajeCliente($request))
            return back()->with('ok', 'Mensaje insertado con exito');
        else
            return back()->with('error', 'Error al insertar Mensaje');
    }

    public function prepareUpdateMensajeCliente(Request $request) {
        $ruta = 'updateMensajeCliente';
        $MensajeCliente = $this->modelMensajeCliente->findMensajeCliente($request->id);
        $html = view('admin.mensaje.formMensajeCliente', compact('MensajeCliente', 'ruta'))->render();
        return response()->json(compact('html'));
    }

    public function updateMensajeCliente(Request $request) {
        if($this->modelMensajeCliente->updateMensajeCliente($request)) { 
            $data = $this->modelMensajeCliente->getAllMensajesClientes();
            $html = view('admin.mensaje.mensajeTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else
            return back()->with('error', 'Error al actualizar Mensaje');
    }

    public function deleteMensajeCliente(Request $request) {
        $data = $this->modelMensajeCliente->deleteMensajeCliente($request->id);
        if($data) {
            $data = $this->modelMensajeCliente->getAllMensajesClientes();
            $html = view('admin.mensaje.mensajeTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else {
            return back()->with('Mensaje_error', 'Error al eliminar el registro');
        }
    }

    public function contacto() {
        return view('Client.contacto');
    }

    public function generarContacto(Request $request) {
        return $this->insertMensajeCliente($request);
    }

}
