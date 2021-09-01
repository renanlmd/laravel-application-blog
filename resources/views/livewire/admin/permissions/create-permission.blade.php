<div>
    <div class="container max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <form wire:submit.prevent="create">
            <div class="flex flex-col py-3 px-5 bg-white rounded-lg">
                <div class="grid-cols-1 gap-4 divide-y divide-light-blue-400">
                    <div class="flex flex-col py-4">
                        <label class="block font-medium text-base text-gray-700" for="">Nome da Permissão</label>
                        <input wire:model="permission.name" type="text" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  rounded-md shadow-sm w-1/2">
                        <p class=" text-sm mt-2">Exemplo para criar uma permissão: criar_usuario</p>
                        @error('permission.name') {{ $message }} @enderror
                    </div>
                    
                    <div class="flex flex-col py-4">
                        
                        <input value="Salvar" type="submit" class=" w-24 text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-green-400 hover:bg-green-500 transition duration-75 uppercase last:mr-0 mr-1 text-center">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
