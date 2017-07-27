<?php

use Illuminate\Database\Seeder;
use App\User;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->name = "Leonardo Godinho";
        $usuario->email = "admin2@mail.com";
        $usuario->password = bcrypt("123456");
        $usuario->save();
    }
}
