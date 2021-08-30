<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use App\Models\Role;

class CreateRole extends Component
{

    public $role;

    public $permissions;

    public function render()
    {
        return view('livewire.admin.roles.create-role');
    }

    public function create()
    {
        // try {

        //     Role::create($this->role);
        //     return redirect()->route('admin.roles');

        // } catch (\Exception $e) {
        //     dd($e);
        // }
    }
}
