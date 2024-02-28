<div>
    <x-slot name='title'>
        {{ __($title)}}
    </x-slot>

    <x-slot name='breadcrumb'>
        <livewire:components.widget.breadcrumb breadcrumb="{{ __($breadcrumb) }}" />
    </x-slot>

    <!-- Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="width: -webkit-fill-available;">Mahasiswa</h3>
                    <a id="table2-new-row-button" class="btn btn-primary" href="{{route('admin.mahasiswa.create')}}" wire:navigate>Add New </a>
                </div>

                <div class="card-body">


                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="myTable">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>nim </th>
                                    <th>name</th>
                                    <th>jabatan</th>
                                    <th>qr code</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                </tr>
                                @foreach ($data as $dt )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dt->nim }}</td>
                                    <td>{{ $dt->name }}</td>
                                    <td>{{ $dt->jabatan }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo" onclick="generateQRCode('{{$dt->qrcode}}')">QR</button>
                                    </td>
                                    <td>{{ $dt->created_at }}</td>
                                    <td class="d-flex justify-content-center border-0">
                                        <a href="{{ route('admin.mahasiswa.edit',$dt->id) }}" class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i class="fe fe-edit"></i></a>
                                        <button class="btn btn-sm btn-danger badge " wire:click="delete({{ $dt->id }})" wire:confirm="Yakin Ingin Menghapus!">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Row -->

    <!-- end datatable -->

    <!-- modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">QR Code</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="qrcode"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        #qrcode img {
            margin: auto;
        }
    </style>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        // Fungsi untuk membuat QR code
        function generateQRCode(text) {
            const div = document.getElementById('qrcode');
            div.innerHTML = "";
            const qrcode = new QRCode(div, text);
        }
    </script>
    <!-- end modal -->
</div>