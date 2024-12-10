<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class ManageUser extends Component
{
    public $sortField = 'name'; // Campo de orden inicial
    public $sortDirection = 'asc'; // Dirección de orden inicial


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
        $all_users = User::orderBy($this->sortField, $this->sortDirection)
                            ->paginate(5);

        return view('livewire.manage-user', [
            'all_users' => $all_users,
        ])->layout('admin-layout');
    }
}
