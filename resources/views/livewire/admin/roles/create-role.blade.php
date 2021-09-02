<div>
    <div class="container max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <form wire:submit.prevent="create">
            <div class="flex flex-col py-3 px-5 bg-white rounded-lg">
                <div class="grid-cols-1 gap-4 divide-y divide-light-blue-400">
                    <div class="flex flex-col py-4">
                        <label class="block font-medium text-base text-gray-700" for="">Defina o Nome da Função</label>
                        <input wire:model="role.name" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-1/2">
                    </div>
                    
                    
                    <div class="flex flex-col py-4">
                        <div class="grid grid-cols-2 gap-3">
                            <div>

                                <label class="block font-medium text-base text-gray-700" for="">Permissões</label>
                                <input wire:click="$set('loadPermissions', true)" wire:model="termNamePermission" type="text" class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-1/2" id="input-permission">
                            </div>
                            <div>
                                @if($loadPermissions)
                                    <div class=" w-3/4 mt-2 rounded-xl border-gray-400 shadow-l bg-gray-50">
                                        <div class="flex justify-between ...">
                                            <div class="pt-2 pl-2">
                                                @if (session()->has('permission_exists'))
                                                    <div class=" text-red-500">
                                                        {{ session('permission_exists') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="order-last pt-2 pr-5 text-red-500">
                                                <i class="fas fa-times cursor-pointer" wire:click="closeSelectPermissions"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="flex flex-col divide-y divide-light-blue-400 @if(count($listPermissions) and count($listPermissions) > 1) overflow-auto h-40 @else h-auto @endif">
                                            
                                            @forelse ($listPermissions as $permission)
                                            
                                                <div class="grid grid-cols-1 py-2 px-3">
                                                    <div>
                                                        <button wire:click="permissionsSelected({{ json_encode($permission) }})" class="text-sm font-semibold hover:cursor-pointer focus:outline-none">{{ $permission->name }}</button>
                                                    </div>
                                                    
                                                </div>
                                            @empty
                                                <div class="grid grid-cols-1 py-2 px-3">
                                                    <div>
                                                        <span class="text-sm font-semibold">Nome da permissão não existe</span>
                                                    </div>
                                                </div>
                                                
                                            @endforelse
                                        </div>   
                                    </div>
                                    
                                @endif
                            </div>
                        </div>
                        
                    </div>
                    @if(count($permissionsSelected))
                        <div class="flex flex-col py-4">
                            <div class="grid grid-cols-7 gap-4">
                                @foreach ($permissionsSelected as $items)
                                    <div class="h-8">
                                        <span class=" w-full h-6 py-1 px-3 text-xs font-bold inline-block rounded-full text-gray-800 bg-blue-300 hover:bg-green-500 transition duration-75  last:mr-0">{{ $items['name'] }}</span>
                                    </div>
                                    
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-col py-4">
                        <input value="Salvar" type="submit" class=" w-24 text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-green-400 hover:bg-green-500 transition duration-75 uppercase last:mr-0 mr-1 text-center">
                    </div>

                    {{-- <div class="flex flex-col py-4">
                        @dump($permissionsChosen)
                    </div>
                    <div class="flex flex-col py-4">
                        @dump($permissionsSelected)
                    </div>
                    <div class="flex flex-col py-4">
                        @dump($termNamePermission)
                    </div> --}}
                </div>
                
            </div>
        </form>
    </div>
</div>

@push('scripts')
    <script>
        // const inputPermission = document.getElementById('input-permission');

        // inputPermission.addEventListener('focus', (event) => {            
        //     @this.set('loadPermissions', true);
        // });

        // inputPermission.addEventListener('focusout', (event) => {
        //     event.target.value = null;
        //     @this.set('termNamePermission', null)
        //     @this.set('loadPermissions', false);
        // });

        
       
    </script>
@endpush
