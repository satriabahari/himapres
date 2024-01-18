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
                    <h3 class="card-title">Mahasiswa</h3>
                </div>

                <div class="card-body">
                    <a  id="table2-new-row-button " class="btn btn-primary mb-4 "  href="{{route('admin.mahasiswa.create')}}" wire:navigate>Add New </a>
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="new-edit">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>nim </th>
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
                                        <td>{{ $dt->nim }}</td>
                                        <td>{{ $dt->name }}</td>
                                        <td>{{ $dt->created_at }}</td>
                                        <td class="d-flex justify-content-center border-0">
                                            <a href="{{ route('admin.mahasiswa.edit',$dt->id) }}"
                                            class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i
                                                class="fe fe-edit"></i></a>
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
