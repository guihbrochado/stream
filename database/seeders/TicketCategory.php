<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketCategory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ticket_categories')->insert([
            'order' => 10,
            'icon' => 'uil-bill',
            'title' => 'Alteração de número de contratos',
        ]);
        
        DB::table('ticket_categories')->insert([
            'order' => 20,
            'icon' => 'uil-moneybag',
            'title' => 'Alteração de conta investimento',
        ]);
        
        DB::table('ticket_categories')->insert([
            'order' => 30,
            'icon' => 'uil-users-alt',
            'title' => 'Alteração de Trader',
        ]);
        
        DB::table('ticket_categories')->insert([
            'order' => 40,
            'icon' => 'uil-comment-question',
            'title' => 'Dúvidas gerais',
        ]);
        
        DB::table('ticket_categories')->insert([
            'order' => 50,
            'icon' => 'uil-pause',
            'title' => 'Cancelamento e pausa',
        ]);
        
        DB::table('ticket_categories')->insert([
            'order' => 60,
            'icon' => 'uil-play',
            'title' => 'Analisar se minha conta está online',
        ]);
    }
}
