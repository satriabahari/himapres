<div>
    <x-slot name='title'>
        {{ __($title) }}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title w-100">{{ $dataAbsent->title }} - {{ $dataAbsent->name_event }}</h3>
                    @can('Absensi.Edit')
                        <a href="{{ route('admin.absensi.event.edit', $dataAbsent->id) }}" class="btn btn-primary btn-sm pe-2"
                            wire:navigate>Edit</a>
                    @endcan
                </div>

                <div class="card-body row">
                    <div class="col-12">
                        @if (session()->has('message'))
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-hidden="true">×</button>
                                {{ session('message') }}</i>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="date" readonly class="form-control" id="date" wire:model="date"
                                value="{{ $dataAbsent->date }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="time" readonly class="form-control" id="time_start" wire:model="time_start"
                                value="{{ $dataAbsent->time_start }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="time" readonly class="form-control" id="time_end" wire:model="time_end"
                                value="{{ $dataAbsent->time_end }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title me-auto">Rekap Absent</h3>
                    <button wire:click="refreshAbsent('{{ $id }}')"
                        class="btn btn-secondary btn-sm ms-2">Refresh</button>

                    @can('Absensi.Scan-Manual')
                        <a href="{{ route('admin.absensi.scan-manual', $id) }}" class="btn btn-warning btn-sm ms-2"
                            wire:navigate>Manual</a>
                    @endcan

                    @can('Absensi.Scan-RFID')
                        <a href="{{ route('admin.absensi.scan-rfid', $id) }}" class="btn btn-primary btn-sm ms-2"
                            wire:navigate>Scan RFID</a>
                    @endcan

                    @can('Absensi.ScanQR')
                        <a href="{{ route('admin.absensi.scan-qr', $id) }}" class="btn btn-primary btn-sm ms-2"
                            wire:navigate>Scan QRCode</a>
                    @endcan
                </div>

                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="new-edit">
                            <thead>
                                <tr>
                                    <th rowspan="2" valign="middle">No</th>
                                    <th rowspan="2">Nim</th>
                                    <th rowspan="2">Nama</th>
                                    <th colspan="4  ">Kehadiran</th>
                                </tr>
                                <tr>
                                    <th>keterangan</th>
                                    <th>Hadir</th>
                                    <th>Izin</th>
                                    <th>Alpa</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $dt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $dt->nim }}</td>
                                        <td>{{ $dt->name }}</td>
                                        <td>{{ $dt->keterangan }}</td>
                                        <td>
                                            @if ($dt->status == '1')
                                                <i class="fe fe-check-circle text-success"></i>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($dt->status == '2')
                                                <i class="fe fe-check-circle text-black"></i>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if ($dt->status == '3')
                                                <i class="fe fe-check-circle text-danger"></i>
                                            @else
                                                -
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="4">Total Kehadiran</td>
                                    <td>{{ $hadir }}</td>
                                    <td>{{ $izin }}</td>
                                    <td>{{ $alfa }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>
