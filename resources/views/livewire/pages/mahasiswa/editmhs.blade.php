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
                    <h4 class="card-title">Edit Anggota</h4>
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
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" wire:model="name" value="{{ $data->name }}" placeholder="name ">
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan" class="form-label">Kategori</label>
                                        <select class="form-select" wire:model="jabatan">
                                            <option value="Mahasiswa" @if ($data->jabatan =='Mahasiswa' ) selected @endif>Mahasiswa</option>
                                            <option value="Dosen" @if ($data->jabatan =='Dosen' ) selected @endif>Dosen</option>
                                            <option value="Tamu" @if ($data->jabatan =='Tamu' ) selected @endif>Tamu</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label for="nim" class="form-label">nim</label>
                                        <input type="text" class="form-control" id="nim" wire:model="nim" value="{{ $data->nim }}" placeholder="nim ">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="card_id" class="form-label">Card ID</label>
                                        <input type="text" class="form-control" id="card_id" wire:model="card_id" value="{{ $data->card_id }}" placeholder="card ID ">
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