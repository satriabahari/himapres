<div>
    <x-slot name='title'>
        {{ __($title) }}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <!-- Row -->
    <div class="row">
        <p>Data memberi absen manual dan izin</p>
    </div>

    <div class="card p-4">
        @if ($pesan_err)
            <div class="alert alert-danger mt-3">
                {{ $pesan_err }}
            </div>
        @endif

        <div class="card-header">
            <h3 class="card-title">Input Manual</h3>
        </div>
        <form wire:submit.prevent="Manual(nim)">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" id="nim" wire:model="nim" placeholder="NIM">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="status_kehadiran">kehadiran</label>
                        <select class="form-control" id="status_kehadiran" wire:model="status_kehadiran">
                            <option value="" disabled selected>Pilih kehadiran</option>
                            <option value="1">Hadir</option>
                            <option value="2">Izin</option>
                            <option value="3">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" id="keterangan" wire:model="keterangan"
                            placeholder="Keterangan">
                    </div>
                </div>
            </div>
            <button class="btn btn-primary mt-4 mb-0 right" name="action">Submit</button>
        </form>
    </div>
</div>
