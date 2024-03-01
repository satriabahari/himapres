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
                <div class="card-body">
                    <table>
                        <tr>
                            <td class="pe-6"><b>Title</b></td>
                            <td class="px-2">:</td>
                            <td>efjhbwfbjek</td>
                        </tr>
                        <tr>
                            <td class="pe-6"><b>Deskripsi</b></td>
                            <td class="px-2">:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="pe-6"><b>Ketua Pelaksana</b></td>
                            <td class="px-2">:</td>
                            <td>efjhbwfbjek</td>
                        </tr>
                        <tr>
                            <td class="pe-6"><b>Tanggal Mulai</b></td>
                            <td class="px-2">:</td>
                            <td>efjhbwfbjek</td>
                        </tr>
                        <tr>
                            <td class="pe-6"><b>Tanggal Selesai</b></td>
                            <td class="px-2">:</td>
                            <td>efjhbwfbjek</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">

                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @foreach ($dataAnggota as $peserta )
                    <li>{{$peserta}}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>