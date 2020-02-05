<?php

namespace Modules\Calls\Seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CallTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('calls')->insert(['origin' => 11, 'destination' => 16, 'value' => 1.90]);
        DB::table('calls')->insert(['origin' => 16, 'destination' => 11, 'value' => 2.90]);
        DB::table('calls')->insert(['origin' => 11, 'destination' => 17, 'value' => 1.70]);
        DB::table('calls')->insert(['origin' => 17, 'destination' => 11, 'value' => 2.70]);
        DB::table('calls')->insert(['origin' => 11, 'destination' => 18, 'value' => 0.90]);
        DB::table('calls')->insert(['origin' => 18, 'destination' => 11, 'value' => 1.90]);
    }
}
