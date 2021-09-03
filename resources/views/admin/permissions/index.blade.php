<x-app-layout>
    <x-slot name="header">
        {{ __('Lista de Permissões') }}
    </x-slot>

    <livewire:admin.permissions.view-all-permissions :permissions="$permissions"></livewire:admin.permissions.view-all-permissions>
</x-app-layout>