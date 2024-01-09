<div>
    <x-slot name='title'>
        {{ __($title) }}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>
    <!-- Edit Permission Form -->
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Permission</h4>
                </div>
                <div class="card-body">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-frown-o me-2" aria-hidden="true">{{ $message }}</i>
                        </div>
                    @enderror

                    <form wire:submit.prevent="updatePermission">
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="role" class="form-label">Roles</label>
                                <input type="text" class="form-control" id="role" wire:model="name"
                                    placeholder="Enter Permissions ...">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mt-4 mb-0 float-right" type="submit"
                                wire:loading.remove>Save</button>
                            <div wire:loading>
                                Saving
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Assigned Permissions Form -->
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Assigned Roles</h4>
                </div>
                <div class="card-body">
                    @if ($permission->roles)
                        <div class="d-flex">
                            @foreach ($permission->roles as $permission_role)
                                <button wire:click="removeRole({{ $permission_role->id }})"
                                    class="btn btn-sm btn-danger-light mt-2 mb-5 mx-2">{{ $permission_role->name }}</button>
                            @endforeach
                        </div>
                    @endif

                    <form wire:submit.prevent="assignRole">
                        @csrf
                        <select wire:model.defer="selectedRole" class="form-control">
                            <option disabled selected>Choose Roles</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary mt-4 mb-0 float-right" type="submit">Save</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
