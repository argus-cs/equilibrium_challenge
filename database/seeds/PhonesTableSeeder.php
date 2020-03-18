<?php

use App\Phone;
use App\Staff;
use Illuminate\Database\Seeder;

class PhonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $staff = Staff::where('id', '1')->firstOrFail();
      Phone::create([
        'number' => '91991730447',
        'staff_id' => $staff->id
      ]);

      Phone::create([
        'number' => '91991789913',
        'staff_id' => $staff->id
      ]);
    }
}
