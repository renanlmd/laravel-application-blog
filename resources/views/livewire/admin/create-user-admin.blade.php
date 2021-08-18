<div>
    

    <x-jet-form-section submit="createAdmin" class="">


    <x-slot name="form">

        @if(session()->has('errors'))
            <div class="col-span-6 sm:col-span-4">
                <div class="font-medium text-red-600">{{ __('Ops! Algo deu errado.') }}</div>

                <ul class="mt-3 max-w-xl text-sm text-red-600">
                    <li>{{ session('errors') }}</li>
                </ul>
            </div>
        @endif
        
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="typeUser" value="{{ __('Tipo do usuário') }}" />
            <x-jet-input id="typeUser" type="text" class="mt-1 block w-full" placeholder="Administrador" disabled />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Nome') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="userAdmin.name" />
            <x-jet-input-error for="userAdmin.name" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('E-mail') }}" />
            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="userAdmin.email" />
            <x-jet-input-error for="userAdmin.email" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="username" value="{{ __('Username') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="userAdmin.username" />
            <x-jet-input-error for="userAdmin.username" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="passwordDefault" value="{{ __('Senha padrão para novos Administradores') }}" />
            <x-jet-input id="passwordDefault" type="text" class="mt-1 block w-full" placeholder="admin123" disabled />
            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>
                    O novo administrador terá que definir uma nova senha pessoal no primeiro momento em que for se autenticar na plataforma.
                </p>
            </div>
        </div>
        
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="admin_created">
            {{ __('Administrador criado.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>


</div>
