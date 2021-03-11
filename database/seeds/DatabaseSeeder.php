<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Tablas a las cuales haré el seeder y voy a truncar
        $this->truncateTablas([
            'rol',
            'permiso',
            'usuario',
            'usuario_rol'
        ]);
        $this->call(TablaRolSeeder::class);
        $this->call(TablaPermisoSeeder::class);
        $this->call(UsuarioAdministradorSeeder::class);

    }
        //Se truncan las tablas para no permitir repetición de registros, así también evitamos errores, no hacer esto en producción(NUNCA)
        protected function truncateTablas(array $tablas)
        {
            DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
            foreach($tablas as $tabla){
                DB::table($tabla)->truncate();
            }
            DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        }
}
