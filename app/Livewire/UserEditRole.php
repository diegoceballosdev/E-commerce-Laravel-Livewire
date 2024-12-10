<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserEditRole extends Component
{
    public $user;

    public $user_role;

    public function mount($id){
        $this->user = User::findOrFail($id);
    }
    public function changeRole(){
        $this->validate([
            'user_role' => 'required|not_in:""',
        ]);

        $this->user->syncRoles([$this->user_role]);

        return redirect('/users');
    }
    public function render()
    {
        return view('livewire.user-edit-role')->layout("admin-layout");
    }
}
