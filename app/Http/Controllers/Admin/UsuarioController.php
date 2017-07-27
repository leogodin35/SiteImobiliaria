<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
      $dados = $request->all();
      //dd($dados); // método para ver os dados
      if (Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])) {
        \Session::flash('mensagem',[
          'msg'   =>'Login realizado com sucesso!',
          'class' =>'green white-text'
        ]);
        return redirect()->route('admin.principal');
      }

      \Session::flash('mensagem',[
        'msg'   =>'Erro! confira se os dados estão corretos.',
        'class' =>'red white-text'
      ]);
      return redirect()->route('admin.login');
    }

    public function sair()
    {
      Auth::logout();
      return redirect()->route('admin.login');
    }

    public function index()
    {
      $usuarios = User::all();
      return view('admin.usuarios.index', compact('usuarios')); // deve passar a variável usuarios como parâmetro
    }

    public function adicionar()
    {
      return view('admin.usuarios.adicionar');
    }

    public function salvar(Request $request)
    {
      // pega todos os dados do formulario
      $dados = $request->all();

      // cria um usuario e armazena os dados
      $usuario = new User();
      $usuario->name = $dados['name'];
      $usuario->email = $dados['email'];
      $usuario->password = bcrypt($dados['password']);

      // Persiste os dados do usuario no BD
      $usuario->save();

      \Session::flash('mensagem',[
        'msg'   =>'Registro criado com sucesso!',
        'class' =>'green white-text'
      ]);

      return redirect()->route('admin.usuarios');
    }

    public function editar($id)
    {
      $usuario = User::find($id);
      return view('admin.usuarios.editar',compact('usuario')); // compact envia a variável usuario para a view para poder editar
    }

    public function atualizar(Request $request, $id)
    {
      $usuario = User::find($id);
      $dados = $request->all();
      if (isset($dados['password']) && strlen($dados['password']) > 5 ) {
        $dados['password'] = bcrypt($dados['password']);
      } else {
        // Se a senha for menor que 5 ele não salva a senha nova e mantem a senha anterior
        unset($dados['password']);
      }

      $usuario->update($dados);

      \Session::flash('mensagem',[
        'msg'   =>'Registro atualizado com sucesso!',
        'class' =>'green white-text'
      ]);

      return redirect()->route('admin.usuarios');
    }

    public function deletar($id)
    {
      User::find($id)->delete();

      \Session::flash('mensagem',[
        'msg'   =>'Registro deletado com sucesso!',
        'class' =>'green white-text'
      ]);

      return redirect()->route('admin.usuarios');
    }

}
