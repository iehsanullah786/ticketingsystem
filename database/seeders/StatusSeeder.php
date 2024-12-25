<?php

namespace Database\Seeders;
use App\StatusesEnum;
use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            StatusesEnum::IN_PROGRESS,
            StatusesEnum::PAID,
            StatusesEnum::MAIL_S,
            StatusesEnum::CLOSED,
        ];

        foreach ($input as $value) {
            Status::create([
                'name' => $value,
            ]);
        }
    }
}
