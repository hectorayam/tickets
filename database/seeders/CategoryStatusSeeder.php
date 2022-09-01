<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\StatusReport;
use App\Models\StatusTask;
use Illuminate\Database\Seeder;


class CategoryStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => 'Codigo'
        ]);

        $estados = [
            'Nuevo',
            'Aceptado',
            'En proceso',
            'Revision',
            'Re-abierto'
        ];

        foreach($estados as $estado){
            StatusReport::create([
                'name' => $estado
            ]);

            StatusTask::create([
                'name' => $estado
            ]);
        }
    }
}
