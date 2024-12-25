<?php

namespace Database\Seeders;
use App\PrioritiesEnum;
use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            PrioritiesEnum::NORMAL,
            PrioritiesEnum::MEDIUM,
            PrioritiesEnum::URGENT,
            PrioritiesEnum::INTERMEDIATE,
        ];

        foreach ($input as $value) {
            Priority::create([
                'name' => $value,
            ]);
        }
    }
}
