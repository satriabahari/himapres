<div>
    <x-slot name='title'>
        {{ __($title) }}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Reader Scan</h3>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-center">Tempelkan Kartu Anda </br> Pada Reader</h3>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <form wire:submit.prevent="submitForm">
                                    <input type="password" class="form-control  mx-auto" id="cardId"
                                        wire:model="cardId" autofocus>
                                    <!-- Tombol submit form -->
                                    <button type="submit" class="btn btn-primary mt-3">Hadir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    {{ $cardId }}

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Kehadiran</h3>
                </div>

                <div class="card-body text-center">
                    <h3 class="text-center">Selamat Pagi </h3>

                    @if ($pesan_err != null)
                        @if ($absensi != null)
                            <p>{{ $pesan_err }}</p>
                            <p>Pukul : {{ $absensi->created_at }}</p>
                        @else
                            <p>{{ $pesan_err }}</p>
                        @endif
                    @else
                        @if ($absensi != null)
                            <i class="fe fe-check-circle text-success fe-lg" style="font-size: 6em;"></i>
                            <p class="mt-5">{{ $absensi->name }}</p>
                            <p>Anda Telah Melakukan Absensi</p>
                            <p>Pukul : {{ $absensi->created_at }}</p>
                        @else
                            <i class="fe fe-users text-black fe-lg " style="font-size: 6em;"></i>
                        @endif
                    @endif





                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
</div>
