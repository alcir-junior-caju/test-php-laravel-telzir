<?php

namespace Modules\Plans\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('plans')->insert(['name' => 'FaleMais 30', 'minutes' => 30, 'percent' => 10]);
        DB::table('plans')->insert(['name' => 'FaleMais 60', 'minutes' => 60, 'percent' => 10]);
        DB::table('plans')->insert(['name' => 'FaleMais 120', 'minutes' => 120, 'percent' => 10]);
    }
}
