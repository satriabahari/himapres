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
<<<<<<< HEAD
                    <h3 class="card-title" style="width: -webkit-fill-available;">Data Posisi Absent Event</h3>
=======
                    <h3 class="card-title" style="width: -webkit-fill-available;">Posisi</h3>
>>>>>>> main
                    <a id="table2-new-row-button " class="btn btn-primary" href="{{route('admin.posisi.create')}}" wire:navigate>Add New </a>
                </div>

                <div class="card-body">
<<<<<<< HEAD
=======

>>>>>>> main
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="myTable">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>name</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                </tr>
                                @foreach ($data as $dt )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dt->name }}</td>
                                    <td>{{ $dt->created_at }}</td>
                                    <td class="d-flex justify-content-center border-0">
                                        <a href="{{ route('admin.posisi.edit',$dt->id) }}" class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i class="fe fe-edit"></i></a>
                                        <button class="btn btn-sm btn-danger badge " wire:click="delete({{ $dt->id }})" wire:confirm="Yakin Ingin Menghapus!">
                                            <i class="fa fa-trash"></i>
                                        </button>
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