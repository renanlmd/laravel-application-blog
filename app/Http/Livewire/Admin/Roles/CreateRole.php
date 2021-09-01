<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;

class CreateRole extends Component
{

    public $role;

    public $listPermissions;

    public $loadPermissions = false;

    public $termNamePermission = null;

    public $permissionsChosen = array();

    public $permissionsSelected = [];

    public function render()
    {
        if($this->loadPermissions){
            if(!empty($this->permissionsChosen)){
                $this->listPermissions = Permission::hiddenPermissionsChosen($this->permissionsChosen);
            }else{
                $this->listPermissions = Permission::limit(10)->get();
            }
        }
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

    public function teste($term)
    {
        $this->termNamePermission = $term;
    }

    public function permissionsSelected($permissionSelected)
    {
        $this->permissionsChosen[] = $permissionSelected['id'];
        $data = Permission::permissionsSelected($permissionSelected['id']);
        foreach ($data as $value) {
            $this->permissionsSelected[] = $value;
        }
    }

    public function closeSelectPermissions()
    {
        $this->loadPermissions = false;
    }
}
