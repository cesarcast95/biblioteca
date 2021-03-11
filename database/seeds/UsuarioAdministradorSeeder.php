<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioAdministradorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'usuario' => 'biblioteca_admin',
            'nombre' => 'Administrador',
            'email' => 'biblioteca@gmail.com',
            'password' => bcrypt('cesarc95')
        ]);
        DB::table('usuario')->insert([
            'usuario' => 'cesar',
            'nombre' => 'Editor',
            'email' => 'cesarzc95@gmail.com',
            'password' => bcrypt('cesarc95')
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 1,
            'usuario_id' => 1,
            
        ]);
        DB::table('usuario_rol')->insert([
            'rol_id' => 2,
            'usuario_id' => 2,
           
        ]);
    }
}
