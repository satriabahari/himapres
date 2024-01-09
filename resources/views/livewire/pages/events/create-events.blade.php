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
                    <h4 class="card-title">Data Event</h4>
                </div>
                <div class="card-body">
                    @error('name')
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                            <i class="fa fa-frown-o me-2" aria-hidden="true"> {{ $message }}</i>
                        </div>
                    @enderror

                    <form wire:submit='save'>
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="title_event" class="form-label">Title Event</label>
                                        <input type="text" class="form-control" id="title_event" wire:model="title_event"
                                            value="{{ old('title_event') }}" placeholder="Event Name">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" cols="30" rows="5" id="description" wire:model="description" placeholder="Detail Event">{{ old('detail') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="date_start" class="form-label">Date Start</label>
                                        <input type="date" class="form-control" id="date_start"  wire:model="date_start"
                                        value="{{ old('date_start') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="date_end" class="form-label">Date End</label>
                                        <input type="date" class="form-control" id="date_end"  wire:model="date_end"
                                        value="{{ old('date_end') }}">
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
