<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{

    function inicio() {
        return view('PaginaPrincipal');
    }

    public function administracion() {
        return view('admin.admin');
    }

}
