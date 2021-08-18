<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;


class CreateUserAdmin extends Component
{
    public $userAdmin;

    protected $rules = [
        'userAdmin.name' => 'required',
        'userAdmin.email' => 'required|email|unique:users,email',
        'userAdmin.username' => 'required|unique:users,username',
    ];

    protected $messages = [
        'userAdmin.email.required' => 'Campo email não pode ser vázio',
        'userAdmin.email.email' => 'Informe um email valido.',
        'userAdmin.email.unique' => 'O email já existe!',
        'userAdmin.name.required' => 'Informe o nome do usuário.',
        'userAdmin.username.required' => 'Defina um Username de acesso.',
        'userAdmin.username.unique' => 'O Username já existe.',
    ];

    public function render()
    {
        return view('livewire.admin.create-user-admin');
    }

    public function createAdmin()
    {
        $this->validate();
        $this->userAdmin['password'] = Hash::make('admin123');
        $this->userAdmin['is_admin'] = true;
        
        try {
            User::create($this->userAdmin);
            $this->emit('admin_created');
            $this->userAdmin = null;

        } catch (\Exception $e) {

            return session()->flash('errors', 'Erro inesperado ao salvar!');
        }
        
    }
}
