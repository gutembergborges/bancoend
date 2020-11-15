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
            'number' => mt_rand(100000, 9999999),
            'balance' => round(mt_rand(0, 100000)*(mt_rand()/mt_getrandmax()), 2),
        ]);
    }
}
