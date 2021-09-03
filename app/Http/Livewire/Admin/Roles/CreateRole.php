<?php

namespace App\Http\Livewire\Admin\Roles;

use Livewire\Component;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

class CreateRole extends Component
{

    public $role;

    protected $rules = [
        'role.name' => 'required|unique:roles,name'
    ];

    protected $messages = [
        'role.name.required' => 'Defina o noma da função.',
        'role.name.unique' => 'Escolha outro nome, não pode existir funções com mesmo nome.'
    ];

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
        $this->validate();
        
        if(empty($this->permissionsSelected)){
            return session()->flash('permissions_required', 'É necessario definir permissões para a função');
        }
        
        try {

            $role = Role::create($this->role);
            foreach ($this->permissionsSelected as $permissions) {
                RolePermission::create([
                    'role_id' => $role->id,
                    'permission_id' => $permissions['id']
                ]);
            }
            return redirect()->route('admin.roles');

        } catch (\Exception $e) {
            dd($e);
        }
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

    public function deletePermissionSelected($keyFromArray)
    {
        unset($this->permissionsChosen[$keyFromArray]);
        unset($this->permissionsSelected[$keyFromArray]);
        $this->termNamePermission = null;

    }

    public function closeSelectPermissions()
    {
        $this->loadPermissions = false;
    }
}
