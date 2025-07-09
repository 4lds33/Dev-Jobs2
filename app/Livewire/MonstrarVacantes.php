<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Vacante;
use App\Models\Categoria;

class MonstrarVacantes extends Component
{
    use WithPagination;

    public $categoria = '';
    public $search = '';

    protected $queryString = ['categoria', 'search'];

    public function updatingCategoria()
    {
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

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
        $categorias = Categoria::all();

        $vacantes = Vacante::where('user_id', auth()->id())
            ->when($this->categoria, fn($query) =>
                $query->where('categoria_id', $this->categoria)
            )
            ->when($this->search, fn($query) =>
                $query->where('titulo', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->paginate(10);

        return view('livewire.monstrar-vacantes', [
            'vacantes' => $vacantes,
            'categorias' => $categorias,
        ]);
    }
}
