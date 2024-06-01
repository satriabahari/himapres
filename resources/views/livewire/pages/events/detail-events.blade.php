<div>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>


    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">

                <div class="card-body d-flex justify-content-between">
                    <table class="mr-6 w-sm-100">
                        <tr>
                            <td class="pe-2 text-nowrap"><b>Title</b></td>
                            <td class="px-2"><b>:</b></td>
                            <td class="pe-4">{{ $dataEvent->name_event }}</td>
                        </tr>
                        <tr>
                            <td class="pe-2 text-nowrap"><b>Deskripsi</b></td>
                            <td class="px-2"><b>:</b></td>
                            <td class="pe-4">{{ $dataEvent->detail }}</td>
                        </tr>
                        <tr>
                            <td class="pe-2 text-nowrap"><b>Tanggal Mulai</b></td>
                            <td class="px-2"><b>:</b></td>
                            <td class="pe-4">{{ $dataEvent->date_start }}</td>
                        </tr>
                        <tr>
                            <td class="pe-2 text-nowrap"><b>Tanggal Selesai</b></td>
                            <td class="px-2"><b>:</b></td>
                            <td class="pe-4">{{ $dataEvent->date_end }}</td>
                        </tr>
                    </table>
                    <div>
                        <a href="{{ route('admin.events.edit',$idEvent) }}" id="table2-new-row-button" class="btn btn-primary btn-sm" wire:navigate>Edit Detail</a>
                        <a wire:click="downloadDetailEvent()" id="table2-new-row-button" class="btn btn-primary btn-sm">Download</a>
                    </div>
                </div>
            </div>
        </div>
        <style>
            .tomboltd td:hover {
                background-color: #6c5ffc42;
                cursor: pointer;
            }
        </style>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Daftar Divisi</h4>
                        <!-- <a id="table2-new-row-button" class="btn btn-primary btn-sm" href="" wire:navigate>Add</a> -->
                    </div>
                    <table class="table tomboltd">
                        <tr>
                            <td wire:click="getAnggota('all')">Semua Divisi</td>
                        </tr>
                        @foreach ($dataDivisi as $divisi )
                        <tr>
                            <td id="{{ $divisi->id }}" wire:click="getAnggota('{{ $divisi->id }}')"> {{$divisi->name}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Daftar Abenst</h4>
                        <!-- <a id="table2-new-row-button" class="btn btn-primary btn-sm" href="" wire:navigate>Add</a> -->
                    </div>
                    <table class="table tomboltd">
                        @foreach ($dataAbsent as $absent )
                        <tr>
                            <td id="{{ $absent->id }}" wire:click="navigateTo('{{ route('admin.absensi.data',$absent->id) }}')"> {{$absent->title}}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class=" col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Daftar Panitia</h4>
                        <a href="{{ route('admin.events.peserta',$idEvent) }}" id="table2-new-row-button" class="btn btn-primary btn-sm" wire:navigate>Add Panitia</a>
                    </div>
                    <table class="table">
                        <tr>
                            <td>Nama</td>
                            <td>NIM</td>
                            <td>Divisi</td>
                            <td>Action</td>
                        </tr>
                        @foreach ($dataAnggota as $peserta )
                        <tr>
                            <td class="pe-4">{{ $peserta->name }}</td>
                            <td class="pe-4">{{ $peserta->nim }}</td>
                            <td class="pe-4">{{ $peserta->divisi }}</td>
                            <td class="pe-4">
                                <a onclick="deleteid(this)" id="{{$peserta->id}}" class="btn btn-sm btn-danger badge text-white mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-deskripsi="Hapus kepanitiaan [{{ $peserta->nim }}]{{$peserta->name}}?">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div>
        <!-- modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Kepanitiaan : </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modalDes"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="tomboldelete" class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function deleteid(element) {
                let parentId = element.id;
                let modalDes = document.getElementById('modalDes');
                modalDes.innerText = element.dataset.deskripsi;
                document.getElementById('tomboldelete').setAttribute('wire:click', "delAnggota('" + parentId + "')");
            }
        </script>
        <!-- end mod    al -->
    </div>
</div>