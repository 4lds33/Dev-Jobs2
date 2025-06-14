<?php

namespace App\Livewire;

use Livewire\Component;

class MonstrarAlerta extends Component
{
    public $message;
    public function render()
    {
        return view('livewire.monstrar-alerta');
    }
}
