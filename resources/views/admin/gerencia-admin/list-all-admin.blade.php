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
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-jet-bar-table :headers="['Nome', 'email', 'username', 'role', '', '']">
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
                            <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </x-jet-bar-table-data>

                        <x-jet-bar-table-data>
                            <a href="#" class="text-gray-400 hover:text-gray-500">
                                <x-jet-bar-icon type="trash" fill />
                            </a>
                        </x-jet-bar-table-data>
                    </tr>
                @empty
                    <tr class="hover:bg-gray-50">
                        wekfjn
                    </tr>
                @endforelse
        </x-jet-bar-table>
        
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="flex flex-col mt-3">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="flex items-center justify-center text-right sm:px-6">
                        @if ($allAdmin->hasPages())
                            <div class="flex items-center">
                                {{-- Previous Page Link --}}
                                @if ($allAdmin->onFirstPage())
                                    <span class="rounded-l rounded-sm border mr-2 bg-gray-800 text-white border-brand-light px-3 py-2 cursor-not-allowed no-underline">&laquo;</span>
                                @else
                                    <a
                                        class="rounded-l rounded-sm border-t border-b border-l border-brand-light mr-2 bg-gray-800 text-white px-3 py-2 text-brand-dark hover:bg-brand-light no-underline"
                                        href="{{ $allAdmin->previousPageUrl() }}"
                                        rel="prev"
                                    >
                                        &laquo;
                                    </a>
                                @endif
                                

                                {{-- Next Page Link --}}
                                @if ($allAdmin->hasMorePages())
                                    <a class="rounded-r rounded-sm border border-brand-light mr-2 bg-gray-800 text-white px-3 py-2 hover:bg-brand-light text-brand-dark no-underline" href="{{ $allAdmin->nextPageUrl() }}" rel="next">&raquo;</a>
                                @else
                                    <span class="rounded-r rounded-sm border border-brand-light mr-2 bg-gray-800 text-white px-3 py-2 hover:bg-brand-light text-brand-dark no-underline cursor-not-allowed">&raquo;</span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>