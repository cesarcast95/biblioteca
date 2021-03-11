<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Permiso;

class TablaPermisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 50 es el número de registros que deseo generar
        // factory(Permiso::class, 50)->create();
        factory(Permiso::class)->times(5)->create();
    }
}
