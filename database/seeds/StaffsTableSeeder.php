<?php

use App\Sector;
use App\Staff;
use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sector = Sector::where('id', '4')->firstOrFail();
      Staff::create([
        'name' => 'Argus',
        'cpf' => '12345678912',
        'carteira' => '123456789123',
        'sectors_id' => $sector->id,
      ]);
    }
}
