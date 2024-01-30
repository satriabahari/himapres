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
                                    <th colspan="3">Kehadiran</th>
                                  </tr>
                                  <tr>
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
                                        <td >
                                            @if ($dt->status == '0')
                                                <i class="fe fe-check-circle text-success"></i>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td >
                                            @if ($dt->status == '1')
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
                                    <td colspan="3">Total Kehadiran</td>
                                    <td >1</td>
                                    <td >0</td>
                                    <td >0</td>
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
