<div>
    <div class="container max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex flex-row mb-8">
            <div>
                <a href="{{ route('admin.roles_create') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded-md w-full focus:outline-none">Criar nova função</a>
            </div>
        </div>
        <div class="bg-white w-4/5 rounded-md shadow-sm px-3 py-2">

            <div class="flex flex-col w-full sm:w-auto px-3 py-2 divide-y divide-light-blue-400">
                @forelse ($roles as $role)
                    
                    <div class="grid grid-cols-4">
                        <div class="col-span-3 py-2 px-2 font-bold">{{ $role->name }}</div>
                        <div class="py-2 text-center">
                            <a href="" class="text-xs font-bold inline-block py-1 px-2 rounded-full text-gray-800 bg-green-400 hover:bg-green-500 transition duration-75 uppercase last:mr-0 mr-1 w-3/4 text-center">Editar</a>
                        </div>
                    </div>
                @empty
                    
                @endforelse
                
            </div>
        </div>
    </div>
</div>

