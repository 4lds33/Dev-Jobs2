<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacante;

class MonstrarVacante extends Component
{
    public Vacante $vacante;

    public function render()
    {
        return view('livewire.monstrar-vacante');
    }
}
