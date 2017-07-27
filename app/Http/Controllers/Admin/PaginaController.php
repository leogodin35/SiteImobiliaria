<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Pagina;

class PaginaController extends Controller
{
    public function index()
    {
      $paginas = Pagina::all();
      return view('admin.paginas.index',compact('paginas'));
    }

    public function editar($id)
    {

    }

    public function atualizar(Request $request, $id)
    {

    }
}
