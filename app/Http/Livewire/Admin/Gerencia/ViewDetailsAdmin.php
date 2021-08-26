<?php

namespace App\Http\Livewire\Admin\Gerencia;

use Livewire\Component;
use App\Models\User;

class ViewDetailsAdmin extends Component
{
    public $admin;

    protected $listeners = ['manageActivationAdmin'];

    public $rules = [
        'admin.name' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin.gerencia.view-details-admin');
    }

    public function manageActivationAdmin($id)
    {
        $user = User::findOrFail($id);
        if($user->activated){
            try {
                $user->activated = false;
                $user->save();
                $this->admin = $user;

                $this->dispatchBrowserEvent('swal:success', [
                    'type' => 'success',
                    'title' => 'Usuario bloqueado.',
                    'text' => 'Ação executada com sucesso!',
                ]);

            } catch (\Exception $e) {
                session()->flash('error', $e->getMessage());
            }
            
        }else{
            try {
                $user->activated = true;
                $user->save();
                $this->admin = $user;

                $this->dispatchBrowserEvent('swal:success', [
                    'type' => 'success',
                    'title' => 'Usuario desbloqueado.',
                    'text' => 'Ação executada com sucesso!',
                ]);

            } catch (\Exception $e) {
                session()->flash('error', $e->getMessage());
            }
        }

    }

    public function confirmActionManageAdmin($id)
    {
        $user = User::findOrFail($id);
        if($user->activated){
            $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'title' => 'Confirme a ação de bloqueio!',
                'text' => 'Tem certeza que deseja bloquear o usuario: '. $user->username,
                'id' => $user->id
            ]);
        }else{
            $this->dispatchBrowserEvent('swal:confirm', [
                'type' => 'warning',
                'title' => 'Confirme a ação de desbloqueio!',
                'text' => 'Tem certeza que deseja desbloquear o usuario: ' . $user->username,
                'id' => $user->id
            ]);
        }
    }
}
