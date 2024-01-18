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
                    <h4 class="card-title">Data Peserta</h4>
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
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nim" class="form-label">NIM</label>
                                        <input type="text" class="form-control" id="nim" wire:model="nim"
                                            value="{{ old('nim') }}" placeholder="NIM Peserta">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="position" class="form-label">Position</label>
                                        <select name="posisi" id="posisi" wire:model="posisi" class="form-control">
                                            <option value="">Pilih Posisi</option>
                                            @foreach ($allpos as $item)
                                                <option value="{{ $item->name }}">{{ $item->name}}</option>
                                            @endforeach
                                        </select>
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
    <div class="row">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Import Excel</h4>
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
                                        <label for="file" class="form-label">File Excel</label>
                                        <input type="file" class="form-control" id="file" wire:model="file"
                                            value="{{ old('file') }}" placeholder="file Peserta">
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
