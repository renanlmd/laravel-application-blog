<div>
    
    @if(!$passwordDefaultUpdated)
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
            <div class="col-span-6 sm:col-span-4">
                <div class="mt-3 max-w-xl text-sm text-gray-600">
                    <p>
                        Olá {{auth()->user()->name}}! <br> 
                        É necessario alterar a senha padrão de administrador para uma senha pessoal de sua preferência.
                    </p>
                </div>
            </div>
        </div>

        <x-jet-form-section submit="updateDefaultPassword" class="">

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
                    <x-jet-label for="password" value="{{ __('Senha') }}" />
                    <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="newPassword.password" />
                    <x-jet-input-error for="newPassword.password" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="confirmation_password" value="{{ __('Confirme a Senha') }}" />
                    <x-jet-input id="confirmation_password" type="password" class="mt-1 block w-full" wire:model.defer="newPassword.confirmation_password" />
                    <x-jet-input-error for="newPassword.confirmation_password" class="mt-2" />
                </div>

            </x-slot>

            <x-slot name="actions">
                <x-jet-action-message class="mr-3" on="password_updated">
                    {{ __('Senha Alterada.') }}
                </x-jet-action-message>

                <x-jet-button>
                    {{ __('Salvar') }}
                </x-jet-button>
            </x-slot>

        </x-jet-form-section> 
    @else 
        <div class="p-4 md:grid md:grid-cols-3 md:gap-6">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                    <div class="col-span-6 sm:col-span-4">
                        <div class="max-w-xl text-sm text-gray-600">
                            <i class="fas fa-exclamation text-2xl mb-2"></i>
                            <p>
                                Nova senha de acesso foi definido. Por favor, não repasse sua senha para outros usuários, é importante manter seguro para que não haja problemas na plataforma. <br>
                                <a href="{{route('admin.home') }}" class="text-xl font-semibold mt-1 hover:underline">Ir para página principal</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
</div>
