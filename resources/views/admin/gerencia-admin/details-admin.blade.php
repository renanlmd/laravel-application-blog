<x-app-layout>
    <x-slot name="header">
        {{ __('Detalhes da conta - '. $user->name) }}
    </x-slot>

    <livewire:admin.gerencia.view-details-admin :admin="$user"></livewire:admin.gerencia.view-details-admin>

    
    
    
</x-app-layout>