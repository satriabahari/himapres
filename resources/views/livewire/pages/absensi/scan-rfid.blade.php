<div>
    <x-slot name='title'>
        {{ __($title) }}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <!-- Row -->
    <div class="row">
        @can('Absensi.Scan-RFID')
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Reader Scan</h3>
                </div>
                <div class="card-body text-center">
                    <h3 class="text-center">Tempelkan Kartu Anda </br> Pada Reader</h3>
                    <div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <form wire:submit.prevent="scanIdCard">
                                    <input type="password" class="form-control  mx-auto" id="cardId" wire:model="cardId" autofocus>
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
        @endcan

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title me-auto">Detail Kehadiran</h3>
                    @can('Absensi.Scan-QR')
                    <a href="{{ route('admin.absensi.scan-qr',$id) }}" class="btn btn-primary btn-sm ms-2" wire:navigate>QRCode</a>
                    @endcan
                </div>

                <div class="card-body text-center">
                    @php
                    $currentHour = date('H'); // Ambil hanya jam dari waktu saat ini
                    @endphp
                    @if ($currentHour >= 5 && $currentHour < 12) <h3 class="text-center">Selamat Pagi</h3>
                        @elseif ($currentHour >= 12 && $currentHour < 15) <h3 class="text-center">Selamat Siang</h3>
                            @elseif ($currentHour >= 15 && $currentHour < 18) <h3 class="text-center">Selamat Sore</h3>
                                @elseif ($currentHour >= 18 && $currentHour < 24) <h3 class="text-center">Selamat Malam</h3>
                                    @endif

                                    @if ($pesan_err != null)
                                    @if ($dataAnggota != null)
                                    <i class="fe fe-check-circle text-success fe-lg" style="font-size: 6em;"></i>
                                    <p>{{ $pesan_err }}</p>
                                    <p>Pukul : {{$currentTime}}</p>
                                    <p>Tanggal : {{$currentDate}}</p>
                                    @else
                                    <i class="fe fe-users text-black fe-lg " style="font-size: 6em;"></i>
                                    <p>{{ $pesan_err }}</p>
                                    @endif
                                    @else
                                    @if ($dataAnggota != null)
                                    <i class="fe fe-check-circle text-success fe-lg" style="font-size: 6em;"></i>
                                    <p class="mt-5">{{ $dataAnggota->name }}</p>
                                    <p>Anda Telah Melakukan Absensi</p>
                                    <p>Pukul : {{$currentTime}}</p>
                                    <p>Tanggal : {{$currentDate}}</p>
                                    @else
                                    <i class="fe fe-users text-black fe-lg " style="font-size: 6em;"></i>
                                    @endif
                                    @endif

                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->
    <style>
        #reader__scan_region video {
            width: -webkit-fill-available !important;
        }

        #html5-qrcode-select-camera {
            width: -webkit-fill-available !important;
        }
    </style>
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        const scannft = document.getElementById('cardId');
        setInterval(function() {
            scannft.focus();
        }, 100);
    </script>
</div>