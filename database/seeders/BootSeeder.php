<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $boots = array(
            'Nike Phantom GT2',
            'adidas X Speedportal',
            'adidas X Speedflow'
        );

        foreach ($boots as $boot) {
            DB::table('boots')->insert(['model' => $boot]);
        }
    }
}
