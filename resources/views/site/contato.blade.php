@extends('layouts.site')

@section('content')

<div class="container">
  <div class="row section">
    <h3 align="center">Contato</h3>
    <div class="divider"></div>
  </div>
  <div class="row section">
    <div class="col s12 m7">
      <img src="{{ asset('img/modelo_img_home.jpg') }}" alt="" class="responsive-img">
    </div>
    <div class="col s12 m5">
      <form class="col s12" action="" method="post">
        <div class="input-field">
          <input type="text" name="nome" value="" class="validate">
          <label for="nome">Nome</label>
        </div>
        <div class="input-field">
          <input type="text" name="email" value="" class="validate">
          <label for="email">E-mail</label>
        </div>
        <div class="input-field">
          <textarea name="mensagem" class="materialize-textarea"></textarea>
          <label for="mensagem">Mensagem</label>
        </div>
        <button type="button" name="button" class="btn blue">Enviar</button>
      </form>
    </div>
  </div>
</div>
@endsection
