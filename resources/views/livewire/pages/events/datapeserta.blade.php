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
                    <h4 class="card-title">Data Peserta</h4>
                </div>
                <div class="card-body">
                    @if(session()->has('sucses'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                        {{ session()->get('sucses') }}
                    </div>
                    @endif
                    @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('error') }}
                    </div>
                    @endif
                    <form wire:submit='save'>
                        <div class="">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="nim" class="form-label">NIM</label>
                                        <input type="text" class="form-control" list="nim-list" id="nim" wire:model="nim" value="{{ old('nim') }}" placeholder="NIM Peserta">
                                        @if(!empty($suggestions))
                                        <datalist id="nim-list">
                                            @foreach($suggestions as $suggestion)
                                            <option value="{{ $suggestion->nim }}">{{ $suggestion->nim }} : {{$suggestion->name}}</option>
                                            @endforeach
                                        </datalist>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="position" class="form-label">Position</label>
                                        <select name="posisi" id="posisi" wire:model="posisi" class="form-control">
                                            <option value="">Pilih Posisi</option>
                                            @foreach ($allpos as $item)
                                            <option value="{{ $item->id }}">{{ $item->name}}</option>
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
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Import Excel</h4>
                    <a href="" wire:click="getTemplateExcel()" id=" table2-new-row-button" class="btn btn-primary btn-sm">Template</a>
                </div>
                <div class="card-body">
                    <form wire:submit='saveExcel' enctype="multipart/form-data">
                        <div class="">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="file" class="form-label">File Excel</label>
                                        <input type="file" class="form-control" id="file" wire:model="file" value="{{ old('file') }}" placeholder="file Peserta">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-4 mb-0 right" name="action">Submit</button>
                    </form>
                    @if (session()->has('excel'))
                    <div class="alert mt-4 border border-primary" role="alert">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                        <div class="me-5">
                            @foreach (session()->get('excel') as $nt)
                            @if ($nt[0])
                            <div class="alert alert-success" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                {{ $nt[1] }}
                            </div>
                            @endif
                            @if (!$nt[0])
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true">×</button>
                                {{ $nt[1] }}
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>