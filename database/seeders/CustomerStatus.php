<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customer_statuses')->insert([
            'customer_status' => 'Ativo'
        ]);
        
        DB::table('customer_statuses')->insert([
            'customer_status' => 'Desligado'
        ]);
        
        DB::table('customer_statuses')->insert([
            'customer_status' => 'Pausado'
        ]);
    }
}
