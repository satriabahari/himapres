<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}"/>
    </x-slot>

      <!-- Row -->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Himasi</h3>
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
                                        <td >{{ $dt->nim }}</td>
                                        <td >{{ $dt->name }}</td>
                                        <td>
                                            @if ($dt->created_at)
                                            @php
                                                $now = now();
                                                $diffHours = $dt->created_at->diffInHours($now);
                                                $maxHours = 2; // Misalnya, maksimal absensi terlambat adalah 2 jam
                                            @endphp

                                            @if ($diffHours < $maxHours)
                                                Pesan: Anda terlambat absen lebih dari 2 jam.
                                            @endif
                                        @endif


                                        </td>
                                        <td >
                                            @if ($dt->status == '1')
                                                <i class="fe fe-check-circle text-success"></i>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td >
                                            @if ($dt->status == '2')
                                                <i class="fe fe-check-circle text-black"></i>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td >
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
                                    <td >{{ $hadir }}</td>
                                    <td >{{ $izin }}</td>
                                    <td >{{ $alfa }}</td>
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
