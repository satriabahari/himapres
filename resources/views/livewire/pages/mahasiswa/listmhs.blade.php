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
                    <h3 class="card-title" style="width: -webkit-fill-available;">Anggota</h3>
                    <a id="table2-new-row-button" class="btn btn-primary" href="{{route('admin.mahasiswa.create')}}" wire:navigate>Add New </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive text-center">
                        <table class="table table-bordered border text-nowrap mb-0 " id="myTable">
                            <thead class="text-center">
                                <tr>
                                    <th>No</th>
                                    <th>nim / nip</th>
                                    <th>name</th>
                                    <th>kategori</th>
                                    <th>id nft</th>
                                    <th>qr code</th>
                                    <!-- <th>Created At</th> -->
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
                                        {{
                                            strlen($dt->card_id) > 2 ?
                                            substr($dt->card_id, 0, 2) . str_pad('', strlen($dt->card_id) - 2, '*') :
                                            $dt->card_id
                                        }}
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalQr" data-bs-whatever="@mdo" onclick="generateQRCode('{{$dt->qrcode}}')">QR</button>
                                    </td>
                                    <!-- <td>{{ $dt->created_at }}</td> -->
                                    <td class="d-flex justify-content-center border-0">
                                        <a href="{{ route('admin.mahasiswa.edit',$dt->id) }}" class="btn btn-sm btn-primary badge  mx-2" wire:navigate><i class="fe fe-edit"></i></a>
                                        <a onclick="deleteid(this)" id="{{$dt->id}}" class="btn btn-sm btn-danger badge text-white mx-1" data-bs-toggle="modal" data-bs-target="#ModalDelete" data-deskripsi="Hapus data [{{ $dt->nim  }}]{{ $dt->name  }}?"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <!-- modal -->
            <div class="modal fade" id="ModalDelete" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5">Hapus Absent : </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p id="modalDes"></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="tomboldelete" class="btn btn-primary" data-bs-dismiss="modal">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function deleteid(element) {
                    let parentId = element.id;
                    let modalDes = document.getElementById('modalDes');
                    modalDes.innerText = element.dataset.deskripsi;
                    document.getElementById('tomboldelete').setAttribute('wire:click', "hapusAnggota('" + parentId + "')");
                }
            </script>
            <!-- end mod    al -->
        </div>
    </div>
    <!-- End Row -->

    <!-- end datatable -->

    <!-- modal -->
    <div>
        <div class="modal fade" id="ModalQr" tabindex="-1" aria-labelledby="ModalQrLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ModalQrLabel">QR Code</h1>
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
    </div>
    <!-- end modal -->
</div>