<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('types')->insert([
            [
                'name' => 'food'
            ],
            [
                'name' => 'metal'
            ],
            [
                'name' => 'chemistry'
            ],
            [
                'name' => 'machine'
            ],
            [
                'name' => 'fiber'
            ],
            [
                'name' => 'other'
            ],
        ]);
    }
}
