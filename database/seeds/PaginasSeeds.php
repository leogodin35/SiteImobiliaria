<?php

use Illuminate\Database\Seeder;
use App\Pagina;

class PaginasSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existe = Pagina::where('tipo','=','sobre')->count(); // recebe a quantidade de páginas sobre existentes
        //dd($existe); // Teste
        if ($existe) {
          $paginaSobre = Pagina::where('tipo','=','sobre')->first();
        } else {
          $paginaSobre = new Pagina();
        }
        //dd($paginaSobre->titulo); // Teste

        $paginaSobre->titulo = "Título da Empresa";
        $paginaSobre->descricao = "Descrição breve sobre a empresa.";
        $paginaSobre->texto = "Texto sobre a empresa.";
        $paginaSobre->imagem = "img/modelo_img_home.jpg";
        $paginaSobre->mapa = '<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1362.3971209576289!2d-46.69511539320655!3d-23.52410352984624!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef87182aef0e3%3A0xd567e81d471e1e0e!2sR.+Faustolo%2C+1018+-+%C3%81gua+Branca%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1spt-BR!2sbr!4v1487354058848" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>';
        $paginaSobre->tipo = "sobre";

        $paginaSobre->save();
        echo "Pagina Sobre criada com sucesso!";
    }
}
