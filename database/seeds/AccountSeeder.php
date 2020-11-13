<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'number' => mt_rand(100000, 400000),
            'balance' => round(mt_rand()/mt_getrandmax(), 2),
        ]);
    }
}
