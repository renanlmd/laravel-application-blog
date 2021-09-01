<?php

namespace App\Http\Livewire\Admin\Permissions;

use Livewire\Component;
use App\Models\Permission;

class CreatePermission extends Component
{
    public $permission;

    protected $rules = [
        'permission.name' => 'required'
    ];

    protected $messages = [
        'permission.name.required' => 'Defina o nome da permissão'
    ];

    public function render()
    {
        return view('livewire.admin.permissions.create-permission');
    }

    public function create()
    {
        $this->validate();

        try {
            Permission::create($this->permission);
            return redirect()->route('admin.permissions');

        } catch (\Exception $e) {
            dd($e);
        }
    }
}
