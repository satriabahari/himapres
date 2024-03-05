<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title w-100">{{$dataAbsent->title}} - {{ $dataAbsent->name_event }}</h3>
                    @can('Absensi.Edit')
                        <a href="{{ route('admin.absensi.event.edit', $dataAbsent->id) }}" class="btn btn-primary btn-sm pe-2" wire:navigate>Edit</a>
                    @endcan
                </div>

                <div class="card-body row">
                    <div class="col-12">
                        @if (session()->has('message'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            {{ session('message') }}</i>
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="date" readonly class="form-control" id="date" wire:model="date" value="{{ $dataAbsent->date }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="time" readonly class="form-control" id="time_start" wire:model="time_start" value="{{ $dataAbsent->time_start }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="time" readonly class="form-control" id="time_end" wire:model="time_end" value="{{ $dataAbsent->time_end }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title w-100">Rekap Absent</h3>
                    <button wire:click="refreshAbsent('{{ $id }}')" class="btn btn-secondary btn-sm pe-4 me-3">Refresh</button>
                    @can('Absensi.Scan-RFID')
                        <a href="{{ route('admin.absensi.scan-rfid',$id) }}" class="btn btn-primary btn-sm pe-4" wire:navigate>Up Absent</a>
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
                                    <td>
                                        @if ($dt->created_at)
                                        @php
                                        $now = now();
                                        $diffHours = $dt->created_at->diffInHours($now);
                                        $maxHours = 2; // Misalnya, maksimal absensi terlambat adalah 2 jam
                                        @endphp

                                        @if ($diffHours < $maxHours) Pesan: Anda terlambat absen lebih dari 2 jam. @endif @endif </td>
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
