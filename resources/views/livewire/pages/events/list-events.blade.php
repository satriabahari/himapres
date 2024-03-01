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
                    <h3 class="card-title" style="width: -webkit-fill-available;">Events</h3>
                    <a id="table2-new-row-button " class="btn btn-primary" href="{{route('admin.events.create')}}" wire:navigate>Add New </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border mb-0 " id="myTable">
                            <thead class="text-center">
                                <tr class="text-nowrap">
                                    <th>No</th>
                                    <th>Title Event</th>
                                    <th style="min-width: 350px;">Description</th>
                                    <th>Date Start</th>
                                    <th>Date End</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $event )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->name_event }}</td>
                                    <td>{{ $event->detail }}</td>
                                    <td>{{ $event->date_start }}</td>
                                    <td>{{ $event->date_end }}</td>
                                    <td>{{ $event->created_at }}</td>
                                    <td class="d-flex justify-content-center border-0">
                                        <a href="{{ route('admin.events.peserta',$event->id) }}" class="btn btn-sm btn-success badge " wire:navigate><i class="fe fe-plus"></i></a>
                                        <!-- <a href="{{ route('admin.events.edit',$event->id) }}" class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i class="fe fe-edit"></i></a> -->
                                        <a href="{{ route('admin.events.detail',$event->id) }}" class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i class="fe fe-eye"></i></a>
                                        <!-- <form wire:submit='' class="inline-block" wire:confirm="Yakin Ingin Menghapus?">
                                            <button class="btn btn-sm btn-danger badge " type="submit" name="action"><i class="fa fa-trash"></i></button>
                                        </form> -->
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