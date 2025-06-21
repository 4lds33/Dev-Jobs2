<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacante;

class MonstrarVacantes extends Component
{
    protected $listeners = ['eliminarVacante'];

    public function monstrarAlerta($id)
    {
        $this->dispatch('monstrarAlerta', $id);
    }

    public function eliminarVacante( Vacante $vacante)
    {
        $vacante->delete();
    }
    public function render()
    {
        $vacantes = Vacante::where('user_id', 1)->paginate(10);
        return view('livewire.monstrar-vacantes', [
            'vacantes' => $vacantes
        ]);

    }
}
