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
                    <h3 class="card-title">Absensi</h3>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border mb-0 " id="myTable">
                            <thead class="text-center">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Title Event</th>
                                    <th>Date Event</th>
                                    <th style="min-width: 350px;">Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $event )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->name_event }}</td>
                                    <td>{{ $event->date_start }} <br>{{ $event->date_end }}</td>
                                    <td>{{ $event->detail }}</td>
                                    <td class="d-flex justify-content-center border-0">
                                        @can('Absensi.Show')
                                        <a href="{{ route('admin.absensi.event',$event->id) }}" class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i class="fe fe-eye"></i></a>
                                        @endcan

                                    </td>
                                </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>