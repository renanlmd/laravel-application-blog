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
                        <label class="block font-medium text-base text-gray-700" for="">Permissões</label>
                        <input wire:click="$set('loadPermissions', true)" wire:keydown="teste($event.target.value)" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-1/2" id="input-permission">
                        @if($loadPermissions)
                            <div class="w-1/3 mt-2 rounded-xl border-t-2 border-r-2 border-l-2 border-gray-400 shadow-lg bg-white">
                                <div class="flex flex-row-reverse pt-2 pr-5">
                                    <div class="text-red-500 text-xl cursor-pointer" wire:click="closeSelectPermissions"><i class="fas fa-times"></i></div>
                                </div>
                                <div class="flex flex-col divide-y divide-light-blue-400 overflow-auto h-40">
                                    @foreach ($listPermissions as $permission)
                                        <div class="grid grid-cols-1 py-2 px-3">
                                            <div>
                                                <button wire:click="permissionsSelected({{ json_encode($permission) }})" class="text-sm font-semibold hover:cursor-pointer">{{ $permission->name }}</button>
                                            </div>
                                        </div>
                                    @endforeach  
                                </div>   
                            </div>
                        @endif
                    </div>
                    
                    
                    <div class="flex flex-col py-4">
                        <input value="Salvar" type="submit" class=" w-24 text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-green-400 hover:bg-green-500 transition duration-75 uppercase last:mr-0 mr-1 text-center">
                    </div>
                    <div class="flex flex-col py-4">
                        @dump($permissionsChosen)
                    </div>
                    <div class="flex flex-col py-4">
                        @dump($permissionsSelected)
                    </div>
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
