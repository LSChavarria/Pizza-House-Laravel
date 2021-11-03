<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    protected $modelUser;
    private $User = array('id' => null, 'name' => null, 'direccion' => null, 'referencia' => null, 'rol' => null, 'email' => null, 'password' => null);

    public function __construct(User $modelUser) {
        $this->modelUser = $modelUser;
    }

    public function user() {
        $ruta = 'updateUser';
        $rutaForm = 'admin.user.formUser';
        $User = $this->User;
        $data = $this->modelUser->getAllUsers();
        return view('admin.user.userAdmin', compact('data', 'ruta', 'rutaForm', 'User'));
    }

    function prepareInsertUser() {
        $ruta = 'insertUser';
        $User = $this->User;
        return view('admin.user.insertUser', compact('User', 'ruta'));
    }

    public function insertUser(Request $request) {
        if($this->modelUser->validarEmailUnico($request->email))
            return back()->with('error', 'Error al insertar usuario correo ya existe');
        if($this->modelUser->insertUser($request))
            return back()->with('ok', 'Usuario insertado con exito');
        else
            return back()->with('error', 'Error al insertar usuario');
    }

    public function prepareUpdateUser(Request $request) {
        $ruta = 'updateUser';
        $User = $this->modelUser->findUser($request->id);
        $html = view('admin.user.formUser', compact('User', 'ruta'))->render();
        return response()->json(compact('html'));
    }

    public function updateUser(Request $request) {
        //if($this->modelUser->validarEmailUnico($request->email))
            //return back()->with('error', 'Error al actualizar usuario correo ya existe');
        if($this->modelUser->updateUser($request)){
            $data = $this->modelUser->getAllUsers();
            $html = view('admin.user.userTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else
            return back()->with('error', 'Error al actualizar usuario');
    }

    public function deleteUser(Request $request) {
        $data = $this->modelUser->deleteUser($request->id);
        if($data) {
            $data = $this->modelUser->getAllUsers();
            $html = view('admin.user.userTable', compact('data'))->render();
            return response()->json(compact('html'));
        }
        else {
            return back()->with('Mensaje_error', 'Error al eliminar el registro');
        }
    }

}
