<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdjustmentType;

class AdjustmentTypeSeeder extends Seeder
{
    public function run(): void
    {
        AdjustmentType::create([
            'id' => '1',
            'name' => 'Days Off',
            'mode' => '-',
        ]);

        AdjustmentType::create([
            'id' => '2',
            'name' => 'Fine',
            'mode' => '-',
        ]);

        AdjustmentType::create([
            'id' => '3',
            'name' => 'Bonus',
            'mode' => '+',
        ]);
    }
}
