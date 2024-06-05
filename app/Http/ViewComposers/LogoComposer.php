<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Models\Inicio;

class LogoComposer
{
    public function compose(View $view)
    {
        $inicio = Inicio::first();
        $view->with('inicio', $inicio);
        
    }
}
