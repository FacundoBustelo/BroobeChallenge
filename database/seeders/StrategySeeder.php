<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Strategy;

class StrategySeeder extends Seeder
{
    public function run()
    {
        $strategies = [
            ['name' => 'DESKTOP'],
            ['name' => 'MOBILE'],
        ];

        foreach ($strategies as $strategy) {
            Strategy::create($strategy);
        }
    }
}