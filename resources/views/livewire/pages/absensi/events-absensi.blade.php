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
                    <h3 class="card-title">{{ $event->name_event }}</h3>
                </div>

                <div class="card-body">
                    @can('Absensi.Create')
                    <a id="table2-new-row-button " class="btn btn-primary mb-4 " href="{{route('admin.absensi.event.create',$event_id)}}" wire:navigate>Tambah Absensi </a>
                    @endcan

                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="new-edit">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Time Start</th>
                                    <th>Time End</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $meeting )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $meeting->title }}</td>
                                    <td>{{ $meeting->date }}</td>
                                    <td>{{ $meeting->time_start }}</td>
                                    <td>{{ $meeting->time_end }}</td>
                                    <td class="d-flex justify-content-center border-0">
                                        @can('Absensi.Scan-RFID')
                                        <a href="{{ route('admin.absensi.scan-rfid',$meeting->id) }}" class="btn btn-sm btn-primary badge  mx-1" wire:navigate><i class="fe fe-arrow-up"></i></a>
                                        @endcan
                                        @can('Absensi.Data')
                                        <a href="{{ route('admin.absensi.data',$meeting->id) }}" class="btn btn-sm btn-secondary badge  mx-1" wire:navigate><i class="fe fe-eye"></i></a>
                                        @endcan
                                        <a onclick="deleteid(this)" id="{{$meeting->id}}" class="btn btn-sm btn-danger badge text-white mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal" data-deskripsi="Hapus sesi absent '{{$meeting->title}}' di event '{{$event->name_event}}'?"><i class="fa fa-trash"></i></a>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Absent : </h1>
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
                modalDes.innerText = element.dataset.deskripsi;
                document.getElementById('tomboldelete').setAttribute('wire:click', "hapusAbsent('" + parentId + "')");
            }
        </script>
    </div>

</div>