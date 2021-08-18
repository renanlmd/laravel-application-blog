<x-app-layout>

    <x-slot name="header">
        {{ __('Alterar Senha Padrão de Administrador') }}
    </x-slot>

    @if(!session('password_updated'))

        <livewire:admin.update-default-password>     
    @else 
        <div class="p-4 md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="col-span-6 sm:col-span-4">
                        <div class="max-w-xl text-sm text-gray-600">
                            <i class="fas fa-exclamation text-2xl mb-2"></i>
                            <p>
                                Esta ação não é requerida, sua senha padrão de administrador já foi alterada.<br>
                                <a href="{{route('admin.home') }}" class="text-xl font-semibold mt-1 hover:underline">Ir para página principal</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>