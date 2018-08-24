<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComprasMenoresController extends Controller
{
    public function index()
    {
        return view('compras_menores.index');
    }
}
