<?php

namespace App\Http\Livewire\Admin\Gerencia;

use Livewire\Component;
use App\Models\User;

class ViewDetailsAdmin extends Component
{
    public $admin;

    public $currentUser = null;

    protected $listeners = ['manageActivationAdmin', 'deleteAccount'];

    public $rules = [
        'admin.name' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin.gerencia.view-details-admin');
    }
    
    public function mount()
    {
        $this->currentUser = $this->admin->id == auth()->user()->id ? true : false;

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

    public function confirmActionDeleteAdmin($id)
    {
        $user = User::findOrFail($id);
        $this->dispatchBrowserEvent('swal:confirmDelete', [
            'type' => 'warning',
            'title' => 'Confirme a ação de bloqueio.',
            'text' => 'Tem certeza que deseja deletar o usuario: ' . $user->username. ' ? 
                Essa ação é irreversivel depois de executada.',
            'id' => $user->id
        ]);
    }

    public function deleteAccount(User $user)
    {
        try {
            if($user->profile_photo_path){
                $user->deleteProfilePhoto();
            }
            $user->tokens->each->delete();
            $user->delete();

            $this->dispatchBrowserEvent('swal:successDeleteAccount', [
                'type' => 'success',
                'title' => 'Conta deletado com sucesso!',
                'text' => 'Usuario '. $user->username . ' foi excluído da plataforma.',
            ]);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
        
    }
}
