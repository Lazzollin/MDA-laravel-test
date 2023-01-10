<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $players = array(
            array('name'=>'Julian Alvarez', 'boots_id'=>2),
            array('name'=>'Enzo Fernandez', 'boots_id'=>1),
            array('name'=>'Alexis Mac Allister', 'boots_id'=>3),
            array('name'=>'Lionel Messi', 'boots_id'=>2),
        );

        foreach ($players as $player) {
            DB::table('players')->insert($player);
        }
    }
}
