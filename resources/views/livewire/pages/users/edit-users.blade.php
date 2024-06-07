<div>
    <x-slot name='title'>
        {{ __($title) }}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Detail User</h4>
                </div>
                <div class="card-body">

                    <div class="">
                        <div class="form-group">
                            <label for="role" class="form-label">Name</label>
                            <input type="text" class="form-control" id="role" name="name" value="{{ $user->name }}" placeholder="Enter Roles ..." disabled>

                            <label for="role" class="form-label">E-mail</label>
                            <input type="text" class="form-control" id="role" name="name" value="{{ $user->email }}" placeholder="Enter Roles ..." disabled>

                            <label for="role" class="form-label mb-0">Role</label>
                            @if ($user->roles)
                            <div class="d-flex">
                                @foreach ($user->roles as $user_role)
                                <button class="btn-sm btn-danger-light mt-4 mb-4 mx-2" type="button" wire:click="removeRole({{ $user->id }}, {{ $user_role->id }})" wire:confirm="Yakin Ingin Menghapus?">
                                    <div wire:loading.remove>
                                        {{ $user_role->name }}
                                    </div>
                                </button>
                                @endforeach
                            </div>
                            @endif
                            <form action="{{ route('admin.users.roles', [$user->id]) }}" method="post">
                                @csrf
                                <select name="role" id="role" class="form-control mt-4  ">
                                    <option disabled selected>Choses Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>

                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-primary mt-4 mb-0 float-right" name="action">Save</button>
                                </div>

                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
</div>