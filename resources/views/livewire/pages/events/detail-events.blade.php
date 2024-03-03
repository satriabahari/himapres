<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <table class="mr-6">
                        <tr>
                            <td class="pe-6 text-nowrap"><b>Title</b></td>
                            <td class="px-2"><b>:</b></td>
                            <td class="pe-4">{{ $dataEvent->name_event }}</td>
                        </tr>
                        <tr>
                            <td class="pe-6 text-nowrap"><b>Deskripsi</b></td>
                            <td class="px-2"><b>:</b></td>
                            <td class="pe-4">{{ $dataEvent->detail }}</td>
                        </tr>
                        <tr>
                            <td class="pe-6 text-nowrap"><b>Tanggal Mulai</b></td>
                            <td class="px-2"><b>:</b></td>
                            <td class="pe-4">{{ $dataEvent->date_start }}</td>
                        </tr>
                        <tr>
                            <td class="pe-6 text-nowrap"><b>Tanggal Selesai</b></td>
                            <td class="px-2"><b>:</b></td>
                            <td class="pe-4">{{ $dataEvent->date_end }}</td>
                        </tr>
                    </table>
                    <div>
                        <a href="{{ route('admin.events.edit',$idEvent) }}" id="table2-new-row-button" class="btn btn-primary btn-sm" wire:navigate>Edit Detail</a>
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
                        </tr>
                        @foreach ($dataAnggota as $peserta )
                        <tr>
                            <td class="pe-4">{{ $peserta->name }}</td>
                            <td class="pe-4">{{ $peserta->nim }}</td>
                            <td class="pe-4">{{ $peserta->divisi }}</td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>