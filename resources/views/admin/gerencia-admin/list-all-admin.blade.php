<x-app-layout>
    <x-slot name="header">
        {{ __('Lista de administradores') }}
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="flex flex-col mt-3">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="flex items-center justify-end text-right sm:px-6">

                        <a href="{{ route('admin.createUserAdmin') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition">Criar Administrador</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <livewire:admin.gerencia.view-all-admins></livewire:admin.gerencia.view-all-admins>
    
</x-app-layout>