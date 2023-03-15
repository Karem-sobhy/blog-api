<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert([
            'name' => 'test1',
            'price'=>500,
            'description' => 'test1 loremloremloremloremloremloremloremlorem',
            'reviews'=>2000,
            'stars'=>3
        ]);
    }
}
