<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\UnitModel;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $data = [
            [
                'unit' => '-',
                'is_admin' => 1
            ],
            [
                'unit' => 'ICT',
                'is_admin' => 0
            ]
        ];

        UnitModel::insert($data);
    }
}
