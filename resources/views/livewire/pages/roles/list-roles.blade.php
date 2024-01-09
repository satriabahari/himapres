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
                    <h3 class="card-title">Roles</h3>
                </div>
                <div class="card-body">
                    <a  id="table2-new-row-button " class="btn btn-primary mb-4"  href="{{route('admin.roles.create')}}" wire:navigate>Add New </a>
                    @error ('massage')
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-frown-o me-2" aria-hidden="true"> {{$message}}</i>
                    </div>
                    @enderror
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="new-edit">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)

                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        @if ($role->permissions )
                                        <div class="d-flex">
                                                @foreach ($role->permissions as $role_permission)
                                                    <div class=" btn-sm btn-success  mx-2">{{$role_permission->name}}</div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </td>
                                    <td class="d-flex justify-content-center border-0">
                                        <a href="{{route('admin.roles.edit',$role->id)}}" class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i class="fe fe-edit"></i></a>
                                        <button class="btn btn-sm btn-danger badge " wire:click="deleteRole({{ $role->id }})" wire:confirm="Yakin Ingin Menghapus!">
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
