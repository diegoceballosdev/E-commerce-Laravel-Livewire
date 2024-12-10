<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination; // Importa el trait para paginación

class ManageOrder extends Component
{
    use WithPagination;

    public $sortField = 'created_at'; // Campo de orden inicial
    public $sortDirection = 'desc'; // Dirección de orden inicial

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

    public function render()
    {
        $all_orders = Order::with('user')
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate(1);

        return view('livewire.manage-order', ['all_orders' => $all_orders,])
        ->layout('admin-layout');
    }
}
