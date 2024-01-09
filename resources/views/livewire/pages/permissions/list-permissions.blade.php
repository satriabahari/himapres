<div>
    <x-slot name='title'>
        {{ __($title) }}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>
    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Permissions</h3>
                </div>
                <div class="card-body">
                    <a id="table2-new-row-button " class="btn btn-primary mb-4"
                        href="{{ route('admin.permissions.create') }}" wire:navigate>Add New </a>
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="new-edit">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>Permission</th>
                                    <th>Guard Name</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                        <td>
                                            @if ($permission->roles)
                                                <div class="d-flex">
                                                    @foreach ($permission->roles as $permission_role)
                                                        <div class=" btn-sm btn-success  mx-2">
                                                            {{ $permission_role->name }}</div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td>
                                        <td class="d-flex justify-content-center border-0">
                                            <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i
                                                    class="fe fe-edit"></i></a>
                                            <button class="btn btn-sm btn-danger badge" wire:click="deletePermission({{ $permission->id }})" wire:confirm="Yakin Ingin Menghapus!"><i class="fa fa-trash"></i></button>
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
