<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Illuminate\Support\Carbon;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Redirect;

class EditarVacante extends Component
{
    use WithFileUploads;

    public Vacante $vacante;
    public $titulo, $salario, $categoria, $empresa, $ultimo_dia, $descripcion, $imagen, $imagen_nueva;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required|date',
        'descripcion' => 'required',
        'imagen_nueva' => 'nullable|image|max:1024',
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;

        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante()
    {
        $datos = $this->validate();

        // Si sube nueva imagen
        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/vacantes');
            $datos['imagen'] = str_replace('public/vacantes/', '', $imagen);
        }

        // Actualizar vacante
        $this->vacante->update([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'] ?? $this->vacante->imagen,
        ]);

        session()->flash('mensaje', 'La vacante se actualizó correctamente');
        return Redirect::route('vacantes.index');
    }

    public function render()
    {
        return view('livewire.editar-vacante', [
            'salarios' => Salario::all(),
            'categorias' => Categoria::all(),
        ]);
    }
}
