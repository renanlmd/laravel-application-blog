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

    public $permissionsSelected = array();

    public function render()
    {
        if($this->loadPermissions){

            if(!$this->termNamePermission) {

                $this->listPermissions = !empty($this->permissionsChosen) ? 
                    Permission::hiddenPermissionsChosen($this->permissionsChosen) :
                    Permission::all();
            }else{

                $this->listPermissions = Permission::searchNamePermission($this->termNamePermission);
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

    public function permissionsSelected($permissionSelected)
    {
        foreach ($this->permissionsSelected as $permission) {
            if($permission['id'] == $permissionSelected['id']){
                return session()->flash('permission_exists', 'Permissão já selecionado.');
            }
        }
        
        $this->permissionsChosen[] = $permissionSelected['id'];
        $data = Permission::permissionsSelected($permissionSelected['id']);
        foreach ($data as $value) {
            $this->permissionsSelected[] = $value;
        }
        $this->termNamePermission = null;
        
    }

    public function closeSelectPermissions()
    {
        $this->loadPermissions = false;
    }
}
