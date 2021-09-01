<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;

class ViewAllPermissions extends Component
{
    public $permissions;

    public function render()
    {
        return view('livewire.admin.permissions.view-all-permissions');
    }
}
