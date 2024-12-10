<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination; // Importa el trait para paginación

class ManageCategory extends Component
{
    use WithPagination;

    public $sortField = 'name'; // Campo de orden inicial
    public $sortDirection = 'asc'; // Dirección de orden inicial
    public $search = '';

    public function sortBy($field)
    {
        // Alterna entre ascendente y descendente si el campo de orden es el mismo
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        return $this->redirect('/categories');
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reinicia la paginación al actualizar la búsqueda
    }

    public function render()
    {
        $all_categories = Category::where('name','like','%'.$this->search.'%')
                            ->orderBy($this->sortField, $this->sortDirection)
                            ->paginate(5);

        return view('livewire.manage-category', [
            'all_categories' => $all_categories,
        ])->layout('admin-layout');
    }
}
