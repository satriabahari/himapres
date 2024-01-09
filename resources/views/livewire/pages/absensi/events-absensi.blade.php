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
                    <h3 class="card-title">{{ $title_event->name_event }}</h3>
                </div>

                <div class="card-body">
                    <a  id="table2-new-row-button " class="btn btn-primary mb-4 "  href="{{route('admin.absensi.event.create',$event_id)}}" wire:navigate>Tambah Absensi </a>
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="new-edit">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $event )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ $event->time_start }}</td>
                                        <td>{{ $event->time_end }}</td>
                                        <td class="d-flex justify-content-center border-0">
                                            <a href="{{ route('admin.events.edit',$event->id) }}"
                                                class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i
                                                    class="fe fe-eye"></i></a>
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
