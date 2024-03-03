<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data Absent</h4>
                </div>
                <div class="card-body">
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                        <i class="fa fa-frown-o me-2" aria-hidden="true"> {{ $message }}</i>
                    </div>
                    @enderror
                    @if (session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('message') }}</i>
                    </div>
                    @endif

                    <form wire:submit='save'>
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title_absent" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title_absent" wire:model="title_absent" value="{{ old('title_absent') }}" placeholder="Title">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="date" class="form-label">Tanggal</label>
                                        <input type="date" class="form-control" id="date" wire:model="date" value="{{ old('date') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="time_start" class="form-label">Time Start</label>
                                        <input type="time" class="form-control" id="time_start" wire:model="time_start" value="{{ old('time_start') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="time_end" class="form-label">Time End</label>
                                        <input type="time" class="form-control" id="time_end" wire:model="time_end" value="{{ old('time_end') }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary mt-4 mb-0 right" name="action">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>