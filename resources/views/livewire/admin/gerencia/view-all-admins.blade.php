<div>
    
    
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="max-w-md mt-3">
            <x-jet-input type="text" class="mt-1 block w-full" wire:model="filters.search" wire:click="gotoPage(1)" placeholder="Procurar..."/>
        </div>

        <x-jet-bar-table>
            <thead class="bg-gray-50">
                <tr>
                    <th wire:click.prevent="applySort('name')" scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="grid grid-flow-col auto-cols-max">
                            <div>
                                @if ($sorts['sortField'] !== 'name')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @elseif ($sorts['sortDirection'] == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                    </svg>
                                @else
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @endif
                            </div>
                            <div class="cursor-pointer">
                                Nome
                            </div>
                        </div>
                    </th>  
                    <th scope="col" wire:click.prevent="applySort('email')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="grid grid-flow-col auto-cols-max">
                            <div>
                                @if ($sorts['sortField'] !== 'email')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @elseif ($sorts['sortDirection'] == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                    </svg>
                                @else
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @endif
                            </div>
                            <div class="cursor-pointer">
                                email
                            </div>
                        </div>
                    </th>  
                    <th scope="col" wire:click.prevent="applySort('username')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="grid grid-flow-col auto-cols-max">
                            <div>
                                @if ($sorts['sortField'] !== 'username')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @elseif ($sorts['sortDirection'] == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                    </svg>
                                @else
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @endif
                            </div>
                            <div class="cursor-pointer">
                                username
                            </div>
                        </div>
                    </th>  
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        função
                    </th>  
                    <th scope="col" wire:click.prevent="applySort('created_at')" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="grid grid-flow-col auto-cols-max">
                            <div>
                                @if ($sorts['sortField'] !== 'created_at')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-2 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @elseif ($sorts['sortDirection'] == 'asc')
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
                                    </svg>
                                @else
                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
                                    </svg>
                                @endif
                            </div>
                            <div class="cursor-pointer">
                                Criado em
                            </div>
                        </div>
                    </th>  
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    </th>  
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($allAdmin as $userAdmin)
                    
                    <tr class="hover:bg-gray-50">
                        <x-jet-bar-table-data>
                            {{ $userAdmin->name }}
                        </x-jet-bar-table-data>

                        <x-jet-bar-table-data>
                            <div class="text-sm text-gray-500">{{ $userAdmin->email }}</div>
                        </x-jet-bar-table-data>

                        <x-jet-bar-table-data>
                            <div class="text-sm text-gray-500">{{ $userAdmin->username }}</div>
                        </x-jet-bar-table-data>

                        <x-jet-bar-table-data>
                            Admin
                        </x-jet-bar-table-data>

                        <x-jet-bar-table-data>
                            {{ $userAdmin->created_at }}
                        </x-jet-bar-table-data>

                        <x-jet-bar-table-data>
                            <a href="#" class="text-indigo-600 text-lg hover:text-indigo-900">
                                <x-jet-bar-badge text="Visualizar detalhes" type="info"></x-jet-bar-badge>
                            </a>
                        </x-jet-bar-table-data>
                    </tr>
                @empty
                    <tr class="hover:bg-gray-50">
                        <x-jet-bar-table-data class="col-span-5">
                            Nenhum registro encontrado...
                        </x-jet-bar-table-data>
                    </tr>
                @endforelse
            </tbody>
        </x-jet-bar-table>
        
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="flex flex-col mt-3">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="flex items-center justify-center text-right sm:px-6">
                        @if ($allAdmin->hasPages())
                            <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between mt-2">
                                <span class="mr-2">
                                    {{-- Previous Page Link --}}
                                    @if ($allAdmin->onFirstPage())
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                            {!! __('pagination.previous') !!}
                                        </span>
                                    @else
                                        <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                            {!! __('pagination.previous') !!}
                                        </button>
                                    @endif
                                </span>

                                <span>
                                    {{-- Next Page Link --}}
                                    @if ($allAdmin->hasMorePages())
                                        <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                            {!! __('pagination.next') !!}
                                        </button>
                                    @else
                                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                            {!! __('pagination.next') !!}
                                        </span>
                                    @endif
                                </span>
                            </nav>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
