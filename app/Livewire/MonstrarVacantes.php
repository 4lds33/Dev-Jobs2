<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vacante;

class MonstrarVacantes extends Component
{
    use WithPagination;

    public function eliminarVacante($id)
    {
        $vacante = Vacante::find($id);

        if ($vacante && $vacante->user_id === auth()->id()) {
            $vacante->delete();
            session()->flash('mensaje', 'Vacante eliminada correctamente.');
        }
    }

    public function render()
    {
        $vacantes = Vacante::where('user_id', auth()->id())->latest()->paginate(10);

        return view('livewire.monstrar-vacantes', [
            'vacantes' => $vacantes
        ]);
    }
}
