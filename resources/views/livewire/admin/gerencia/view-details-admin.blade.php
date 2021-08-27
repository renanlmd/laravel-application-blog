<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 bg-white rounded-md shadow-lg divide-y divide-gray-400">
            <div class="grid grid-cols-3 md:col-span-2 ">
                <div class="col-span-2">
                    <div class="flex flex-col md:flex-row p-3">
                        <div class="grid grid-cols-5 w-4/5">
                            <div class="pt-2 font-semibold text-center">Nome:</div>
                            <div class="pt-2 col-span-4">{{ $admin->name }}</div>
                        </div>
                    
                    </div>
                    <div class="flex flex-col md:flex-row p-3">
                        <div class="grid grid-cols-5 w-4/5">
                            <div class="pt-2 font-semibold text-center">Email:</div>
                            <div class="pt-2 col-span-4">{{ $admin->email }}</div>
                        </div>
                        
                    </div>
                    <div class="flex flex-col md:flex-row p-3">
                        <div class="grid grid-cols-5 w-4/5">
                            <div class="pt-2 font-semibold text-center">Username:</div>
                            <div class="pt-2 col-span-4">{{ $admin->username }}</div>
                        </div>
                        
                    </div>
                    <div class="flex flex-col md:flex-row p-3">
                        <div class="grid grid-cols-5 w-4/5">
                            <div class="pt-2 font-semibold text-center">Função:</div>
                            <div class="pt-2 col-span-4">@if($admin->is_admin) Administrador @endif</div>
                        </div>
                        
                    </div>
                </div>
                <div>
                    <div class=" h-full flex flex-wrap justify-center content-center ...">
                        <div>
                            @if(is_null($admin->profile_photo_path))
                                <img src="/img/file-photo-default.png" class="rounded-full h-40 w-40 object-cover" alt="">
                            @else 
                                <img src="{{ $admin->profile_photo_url }}" class="rounded-full h-40 w-40 object-cover" alt="">
                            @endif
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="p-5">
                <div class="grid grid-cols-5 gap-2 w-2/4 h-9">
                    <div class="text-center font-semibold pt-1"><span class=" text-lg">Ações:</span></div>
                    <div class="col-span-2 ">
                        @if($admin->activated)
                            <button wire:click="confirmActionManageAdmin({{ $admin->id }})" class="@if($currentUser) bg-gray-500 disabled:opacity-50 cursor-not-allowed @else bg-gray-500 hover:bg-gray-700 @endif  text-white font-bold py-2 px-4 rounded-md w-full focus:outline-none" @if($currentUser) disabled @endif>Bloquear</button>
                        @else 
                            <button wire:click="confirmActionManageAdmin({{ $admin->id }})" class="@if($currentUser) bg-gray-500 disabled:opacity-50 cursor-not-allowed @else bg-gray-500 hover:bg-gray-700 @endif text-white font-bold py-2 px-4 rounded-md w-full focus:outline-none" @if($currentUser) disabled @endif>Desbloquear</button>
                        @endif
                    </div>

                    <div class="col-span-2">

                        <button wire:click="confirmActionDeleteAdmin({{ $admin->id }})" class="@if($currentUser) bg-red-500 disabled:opacity-50 cursor-not-allowed @else bg-red-500 hover:bg-red-700 @endif text-white font-bold py-2 px-4 rounded-md w-full focus:outline-none" @if($currentUser) disabled @endif>Deletar conta</button>

                    </div>
                    
                </div>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('swal:confirm', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('manageActivationAdmin', event.detail.id)
                } else {
                    swal('Ação cancelada!');
                }
            });
        });

        window.addEventListener('swal:success', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: "success",
                timer: 3000
            });
        });

        window.addEventListener('swal:confirmDelete', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.livewire.emit('deleteAccount', event.detail.id)
                } else {
                    swal('Ação cancelada!');
                }
            });
        });

        window.addEventListener('swal:successDeleteAccount', event => {
            swal({
                title: event.detail.title,
                text: event.detail.text,
                icon: "success",
                timer: 4000
            }).then(function(){
                window.location = 'http://localhost/admin/administradores';
            });
        });
        
    </script>
@endpush