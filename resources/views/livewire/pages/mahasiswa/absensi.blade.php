<div>
    <x-slot name='title'>
        {{ __($title) }}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    @if (count($events) > 0)
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title me-auto">Rekap Absensi Anggota (NIM:
                            {{ $nim }})</h3>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive text-center">
                            <table class="table table-bordered border text-nowrap mb-0 p-0" id="myTable">
                                <thead>
                                    <tr>
                                        <th rowspan="2"valign="middle">No</th>
                                        <th rowspan="2">Absensi</th>
                                        <th rowspan="2">Acara</th>
                                        <th rowspan="2">Detail</th>
                                        <th rowspan="2">Posisi</th>
                                        <th rowspan="2">Tanggal Mulai</th>
                                        <th rowspan="2">Tanggal Selesai</th>
                                        <th rowspan="2">Waktu</th>
                                        <th colspan="4">Kehadiran</th>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Hadir</th>
                                        <th>Izin</th>
                                        <th>Alpa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $event->title ?? '-' }}</td>
                                            <td>{{ $event->name_event }}</td>
                                            <td>{{ $event->detail }}</td>
                                            <td>{{ $event->position_name }}</td>
                                            <td>{{ $event->date_start }}</td>
                                            <td>{{ $event->date_end }}</td>
                                            <td>{{ $event->waktu ?? '-' }}</td>
                                            <td>{{ $event->keterangan }}</td>
                                            <td>
                                                @if ($event->status == '1')
                                                    <i class="fe fe-check-circle text-success"></i>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($event->status == '2')
                                                    <i class="fe fe-check-circle text-warning"></i>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if ($event->status == '3')
                                                    <i class="fe fe-check-circle text-danger"></i>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="9">Total Kehadiran</td>
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
    @else
        <p class="text-danger">Tidak ada data absensi untuk anggota ini.</p>
    @endif
</div>
