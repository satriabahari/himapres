<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}"/>
    </x-slot>

    <div class="row mx-auto">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Roles</h4>
                </div>
                <div class="card-body">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-frown-o me-2" aria-hidden="true"> {{ $message }}</i>
                        </div>
                    @enderror

                    <form wire:submit="updateRole">

                        <div class="">
                            <div class="form-group">
                                <label for="role" class="form-label">Roles</label>
                                <input type="text" class="form-control" id="role" wire:model="roleName"
                                    placeholder="Enter Roles ...">
                            </div>

                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mt-4 mb-0 float-right" type="submit" wire:loading.remove>Save</button>
                            <div wire:loading>
                                Saving role
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>


    </div>

    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Assigned Permissions</h4>
            </div>
            <div class="card-body">
                @if ($role->permissions)
                    <div class="d-flex">
                        @foreach ($role->permissions as $role_permission)
                            <button wire:click="revokePermission({{ $role_permission->id }})"
                                class="btn btn-sm btn-danger-light mt-2 mb-5 mx-2">{{ $role_permission->name }}</button>
                        @endforeach
                    </div>
                 @endif
                <form wire:submit.prevent="savePermission">
                    @csrf
                    <select wire:model.defer="selectedPermission" class="form-control">
                        <option selected>Choose Permissions</option>
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->name }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mt-4 mb-0 float-right" name="action">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>

</div>
</div>
