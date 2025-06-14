<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacante;

class MonstrarVacantes extends Component
{
    public function render()
    {
        $vacantes = Vacante::where('user_id', 1)->paginate(10);
        return view('livewire.monstrar-vacantes', [
            'vacantes' => $vacantes
        ]);

    }
}
