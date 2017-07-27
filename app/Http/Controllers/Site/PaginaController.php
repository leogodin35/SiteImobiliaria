<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pagina;

class PaginaController extends Controller
{
    public function sobre()
    {
      $pagina = Pagina::where('tipo','=','sobre')->first();
      //dd($pagina); // teste
      return view('site.sobre', compact('pagina'));
    }
}
