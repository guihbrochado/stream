<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketStatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ticket_statuses')->insert([
            'order' => 10,
            'style' => 'warning',
            'title' => 'Novo',
        ]);

        DB::table('ticket_statuses')->insert([
            'order' => 20,
            'style' => 'secondary',
            'title' => 'Lido',
        ]);

        DB::table('ticket_statuses')->insert([
            'order' => 30,
            'style' => 'success',
            'title' => 'Em atendimento',
        ]);

        DB::table('ticket_statuses')->insert([
            'order' => 40,
            'style' => 'primary',
            'title' => 'Concluído',
        ]);
    }
}
