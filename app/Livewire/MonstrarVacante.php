<?php

namespace App\Livewire;

use Livewire\Component;

class MonstrarVacante extends Component
{

    public $vacante;
    public function render()
    {
        return view('livewire.monstrar-vacante');
    }
}
