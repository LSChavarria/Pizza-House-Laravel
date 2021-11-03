<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SucursalController extends Controller
{
    
    protected $modelSucursal;
    private $Sucursal = array('id' => null, 'nombre' => null, 'direccion' => null, 'telefono' => null, 'apertura' => null, 'urlMapa' => null);
    private $urlMapaDefault = "https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1797.1820465567134!2d-100.31475422185666!3d25.725470496409326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2smx!4v1634873778557!5m2!1ses-419!2smx";

    public function __construct(Sucursal $modelSucursal) {
        $this->modelSucursal = $modelSucursal;
    }

    public function sucursal(){
        $ruta = 'updateSucursal';
        $rutaForm = 'admin.sucursal.formSucursal';
        $Sucursal = $this->Sucursal;
        $data = $this->modelSucursal->getAllSucursales();
        return view('admin.sucursal.sucursalAdmin', compact('data', 'Sucursal', 'rutaForm', 'ruta'));
    }

    public function prepareInsertSucursal() {
        $ruta = 'insertSucursal';
        $Sucursal = $this->Sucursal;
        return view('admin.sucursal.insertSucursal', compact('Sucursal', 'ruta'));
    }
    
    public function insertSucursal(Request $request) {
        if($this->modelSucursal->insertSucursal($request))
            return back()->with('ok', 'Sucursal insertada con exito');
        else
            return back()->with('error', 'Error al insertar Sucursal');
    }

    public function prepareUpdateSucursal(Request $request) {
        $ruta = 'updateSucursal';
        $Sucursal = $this->modelSucursal->findSucursal($request->id);
        $html = view('admin.sucursal.formSucursal', compact('Sucursal', 'ruta'))->render();
        return response()->json(compact('html'));
    }
    
    public function updateSucursal(Request $request) {
        if($this->modelSucursal->updateSucursal($request)) {
            $data = $this->modelSucursal->getAllSucursales();
            $html = view('admin.sucursal.sucursalTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else
            return back()->with('error', 'Error al actualizar Sucursal');
    }

    public function deleteSucursal(Request $request) {
        $data = $this->modelSucursal->deleteSucursal($request->id);
        if($data) {
            $data = $this->modelSucursal->getAllSucursales();
            $html = view('admin.sucursal.sucursalTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else {
            return back()->with('Mensaje_error', 'Error al eliminar el registro');
        }
    }
    
    public function ubicacion() {
        $urlMapa = $this->urlMapaDefault;
        $selectedId = 0;
        $sucursales = [];
        $allSucursales = $this->modelSucursal->getAllSucursales();
        $nextApertura = Sucursal::getNextApertura();
        if($nextApertura != null)
            for($i = 0; $i < count($allSucursales); $i++) 
                if($nextApertura->id == $allSucursales[$i]->id)
                    unset($allSucursales[$i]);
        foreach($allSucursales as $s) {
            $s->apertura = Carbon::parse($s->apertura);
            $sucursales[] = $s;
        }
        $ajustes = $this->modelSucursal->ajustes($sucursales);
        return view('Client.sucursales.ubicacion', compact('sucursales', 'ajustes', 'urlMapa', 'selectedId'));
    }

    public function ubicacionSucursal(Request $request) {
        $aux = explode(" ", $request->urlMapa);
        $urlMapa = $aux[0];
        $selectedId = $aux[1];
        $sucursales = [];
        $allSucursales = $this->modelSucursal->getAllSucursales();
        $nextApertura = Sucursal::getNextApertura();
        if($nextApertura != null)
            for($i = 0; $i < count($allSucursales); $i++) 
                if($nextApertura->id == $allSucursales[$i]->id)
                    unset($allSucursales[$i]);
        foreach($allSucursales as $s) {
            $s->apertura = Carbon::parse($s->apertura);
            $sucursales[] = $s;
        }
        $html = view('Client.sucursales.mapaSucursales', compact('sucursales', 'urlMapa', 'selectedId'))->render();
        return response()->json(compact('html'));
    }

}
