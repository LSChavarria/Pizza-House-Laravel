<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MensajeCliente extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function findMensajeCliente($id) {
        return MensajeCliente::findorFail($id);
    }

    public function getAllMensajesClientes() {
        return MensajeCliente::all();
    }

    public function insertMensajeCliente($request) {
        $msj = new MensajeCliente;
        $msj->idCliente = $request->idCliente;
        $msj->mensaje = $request->mensaje;
        return $msj->save() ? true : false;
    }

    public function updateMensajeCliente($request) {
        $msj = $this->findMensajeCliente($request->id);
        $msj->mensaje = $request->mensaje;
        return $msj->save() ? true : false;
    }

    public function deleteMensajeCliente($id) {
        return $this->findMensajeCliente($id)->delete() ? true : false;
    }
}
