<?php

use App\Sector;
use Illuminate\Database\Seeder;

class SectorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Sector::create([
        'name' => 'vendas'
      ]);

      Sector::create([
        'name' => 'escritorio'
      ]);

      Sector::create([
        'name' => 'estoque'
      ]);

      Sector::create([
        'name' => 'administrativo'
      ]);
    }
}
