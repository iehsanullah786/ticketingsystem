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
            StatusesEnum::UN_ASSIGNED,
            StatusesEnum::ASSIGNED,
            StatusesEnum::AWAITINGCLIENTRESPONSE,
            StatusesEnum::CLOSED,
        ];

        foreach ($input as $value) {
            Status::create([
                'name' => $value,
            ]);
        }
    }
}
