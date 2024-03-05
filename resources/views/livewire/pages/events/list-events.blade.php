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
                    @can('Event.Create')
                        <a id="table2-new-row-button " class="btn btn-primary" href="{{route('admin.events.create')}}" wire:navigate>Add New </a>
                    @endcan
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
                                    <!-- <th>Created At</th> -->
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $event )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->name_event }}</td>
                                    <td>{{ $event->detail }}</td>
                                    <!-- <td><textarea style="width: 100%; border:none;" readonly rows="5">{{ $event->detail }}</textarea></td> -->
                                    <td>{{ $event->date_start }}</td>
                                    <td>{{ $event->date_end }}</td>
                                    <!-- <td>{{ $event->created_at }}</td> -->
                                    <td class="d-flex justify-content-center border-0">
                                        <a href="{{ route('admin.events.detail',$event->id) }}" class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i class="fe fe-eye"></i></a>
                                        <a onclick="deleteid(this)" id="{{$event->id}}" class="btn btn-sm btn-danger badge text-white mx-1" data-bs-toggle="modal" data-bs-target="#ModalDelete" data-deskripsi="Hapus event <b>{{$event->name_event }}?</b>"><i class="fa fa-trash"></i></a>
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
    <div>
        <!-- modal -->
        <div class="modal fade" id="ModalDelete" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5">Hapus Absent : </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="modalDes"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="tomboldelete" class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function deleteid(element) {
                let parentId = element.id;
                let modalDes = document.getElementById('modalDes');
                modalDes.innerHTML = element.dataset.deskripsi;
                document.getElementById('tomboldelete').setAttribute('wire:click', "hapusEvent('" + parentId + "')");
            }
        </script>
        <!-- end mod    al -->
    </div>
</div>
