<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryModel;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'information' => 'KENDALA PADA PERANGKAT KERAS',
                'unit_id' => 2
            ],
            [
                'information' => 'KENDALA JARINGAN INTERNET',
                'unit_id' => 2
            ],
            [
                'information' => 'KENDALA PADA PERANGKAT LUNAK',
                'unit_id' => 2
            ],
            [
                'information' => 'KOMPUTER ERROR',
                'unit_id' => 2
            ]
        ];

        CategoryModel::insert($data);
    }
}
