<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}"/>
    </x-slot>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Roles</h4>
                </div>
                <div class="card-body">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-frown-o me-2" aria-hidden="true"> {{ $message }}</i>
                        </div>
                    @enderror

                    <form wire:submit='save'>
                        @csrf
                        <div class="">
                            <div class="form-group">
                                <label for="role" class="form-label">New Roles</label>
                                <input type="text" class="form-control" id="role" wire:model="name"
                                    value="{{ old('name') }}" placeholder="Enter Roles ...">
                            </div>

                        </div>
                        <button class="btn btn-primary mt-4 mb-0 right" name="action">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
