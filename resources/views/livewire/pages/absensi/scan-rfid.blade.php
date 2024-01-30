<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}"/>
    </x-slot>

      <!-- Row -->
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Himasi</h3>
                </div>

                <div class="card-body">
                    <h1>RFID Scanner</h1>
                    <p>Hasil RFID: {{ $rfidResult }}</p>

                    <button wire:click="startRFIDScan">Mulai Pemindaian RFID</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>
