<x-app-layout>
    <x-slot name="header">
        {{ __('Gerenciar Funções e Permissões') }}
    </x-slot>

    <livewire:admin.roles.view-all-roles :roles="$roles"></livewire:admin.roles.view-all-roles>
</x-app-layout>