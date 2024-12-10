<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination; // Importa el trait para paginación

class ProductTable extends Component
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
        $product = Product::find($id);
        $product->delete();
        return $this->redirect('/products');
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reinicia la paginación al actualizar la búsqueda
    }

    public function render()
    {
        $all_products = Product::with('category')
                    ->where('name','like','%'.$this->search.'%')
                    ->orderBy($this->sortField, $this->sortDirection)
                    ->paginate(8);

        return view('livewire.product-table', [
            'all_products' => $all_products,
        ]);
    }
}
