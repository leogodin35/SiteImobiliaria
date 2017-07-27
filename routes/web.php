<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('site.home');
});
*/
// Cria uma rota para home com apelido site.home
Route::get('/',['as'=>'site.home', function(){
  return view('site.home');
}]);
// Cria uma rota para sobre, com apelido site.sobre, com controller PaginaController e o método @sobre
Route::get('/sobre',['as'=>'site.sobre', 'uses'=>'Site\PaginaController@sobre']);

// Cria uma rota para contato com apelido site.contato
Route::get('/contato',['as'=>'site.contato', function(){
  return view('site.contato');
}]);
// Cria uma rota para imovel com apelido site.imovel
Route::get('/imovel/{id}/{titulo?}',['as'=>'site.imovel', function(){
  return view('site.imovel');
}]);

// Desabilitar o sistema de autenticação padrão do laravel
//Auth::routes();

// Criar um sistema de autenticação personalizado
// com a rota admin.login
Route::get('/admin/login',['as'=>'admin.login', function(){
  return view('admin.login.index');
}]);

// Rota utilizando o controller de login
Route::post('/admin/login',['as'=>'admin.login', 'uses'=>'Admin\UsuarioController@login']);

// Cria uma rota de grupo protegido por autenticação
Route::group(['middleware'=>'auth'],function(){

  // Cria uma rota para a pagina admin principal
  Route::get('/admin',['as'=>'admin.principal', function(){
    return view('admin.principal.index');
  }]);

  // Rota para sair do login
  Route::get('/admin/login/sair',['as'=>'admin.login.sair', 'uses'=>'Admin\UsuarioController@sair']);

  // Rota para listagem dos usuarios
  Route::get('/admin/usuarios',['as'=>'admin.usuarios', 'uses'=>'Admin\UsuarioController@index']);

  // Rota para adicionar um usuario
  Route::get('/admin/usuarios/adicionar',['as'=>'admin.usuarios.adicionar', 'uses'=>'Admin\UsuarioController@adicionar']);

  // Rota para salvar quando adicionar um usuario
  Route::post('/admin/usuarios/salvar',['as'=>'admin.usuarios.salvar', 'uses'=>'Admin\UsuarioController@salvar']);

  // Rota para editar um usuario
  Route::get('/admin/usuarios/editar/{id}',['as'=>'admin.usuarios.editar', 'uses'=>'Admin\UsuarioController@editar']);

  // Rota para atualizar quando for editar um usuario
  Route::put('/admin/usuarios/atualizar/{id}',['as'=>'admin.usuarios.atualizar', 'uses'=>'Admin\UsuarioController@atualizar']);

  // Rota para deletar Registro
  Route::get('/admin/usuarios/deletar/{id}',['as'=>'admin.usuarios.deletar', 'uses'=>'Admin\UsuarioController@deletar']);

  // Rota para listar as páginas
  Route::get('admin/paginas',['as'=>'admin.paginas', 'uses'=>'Admin\PaginaController@index']);

  // Rota para editar as páginas
  Route::get('admin/paginas/editar/{id}',['as'=>'admin.paginas.editar', 'uses'=>'Admin\PaginaController@editar']);

  // Rota para atualizar as informações das páginas
  Route::put('admin/paginas/atualizar/{id}',['as'=>'admin.paginas.atualizar', 'uses'=>'Admin\PaginaController@atualizar']);

});
