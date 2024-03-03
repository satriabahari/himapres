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
                                        <label for="title_event" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title_event" wire:model="title_event" value="{{ old('title_event') }}" placeholder="Title">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="time_start" class="form-label">Time Start</label>
                                        <input type="time" class="form-control" id="time_start" wire:model="time_start" value="{{ old('time_start') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="time_end" class="form-label">Time End</label>
                                        <input type="time" class="form-control" id="time_end" wire:model="time_end" value="{{ old('time_end') }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-primary mt-4 mb-0 right" name="action">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>