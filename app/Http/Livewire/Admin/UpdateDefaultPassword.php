<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;
use Laravel\Fortify\Rules\Password;

class UpdateDefaultPassword extends Component
{
    public $newPassword = [];
    public $passwordDefaultUpdated;

    public $rules = [
        'newPassword.password' => '
            required|
            min:8|
            regex:/[0-9]/|
            regex:/[@$!%*#?&]/|',
        'newPassword.confirmation_password' => 'required|same:newPassword.password',
    ];

    protected $messages = [
        'newPassword.password.required' => 'Defina a senha.',
        'newPassword.password.min' => 'A senha deve ter pelo menos 10 caracteres.',
        'newPassword.password.regex' => 'A senha deve conter numeros e simbolos.',
        'newPassword.confirmation_password.required' => 'É necessário confirmar a senha.',
        'newPassword.confirmation_password.same' => 'As senhas devem ser iguais.',
    ];

    protected $validationAttributes = [
        'newPassword.password' => 'Senha',
        'newPassword.confirmation_password' => 'Confirmar senha',
    ];

    public function mount()
    {
        $this->passwordDefaultUpdated = false; 
    }

    public function render()
    {
        return view('livewire.admin.update-default-password');
    }

    public function updateDefaultPassword(UpdatesUserPasswords $updater)
    {
        $this->validate();

        if($updater->updatePasswordDefault(Auth::user(), $this->newPassword)){
            $this->newPassword = [];

            $this->passwordDefaultUpdated = true;

            $this->emit('password_updated');

        }
    }
}
