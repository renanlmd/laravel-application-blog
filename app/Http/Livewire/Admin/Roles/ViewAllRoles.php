<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;

class ViewAllRoles extends Component
{
    public $roles;
    
    public function render()
    {
        return view('livewire.admin.roles.view-all-roles');
    }
}
