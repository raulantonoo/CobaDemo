


<div class="container mr-auto ml-auto" style="margin-top:5%">
    <div class="card">
        <nav class="" pt-3 style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Cek Ongkos Kirim</li>

            </ol>
        </nav>
        <div class="row">
            <div class="col-md-3">
                <div class="card ml-3 mb-4">
                    <div class="card-body">
                        <h3>DESTINATION</h3>
                        <hr>
                        <div>
                        {{ @$alamat->alamat }}<br />
                        {{ @$alamat->kelurahan}}, {{ @$alamat->kecamatan}}<br />
                        {{ @$alamat->city->name}}, {{ @$alamat->province->name}} - {{ $alamat->kodepos}}
                        </div>
                        <div class="form-group">
                            <form wire:submit.prevent="getOngkir">
                              

                                <label for="jasa" class="font-weight-bold">jasa pengiriman</label>
                                <select class="form-control" name="jasa" wire:model="jasa">
                                    <option value="">-- pilih jasa pengiriman --</option>
                                    <option value="jne">JNE</option>
                                    <option value="pos">Pos Indonesia</option>
                                    <option value="tiki">Tiki</option>
                                </select>

                                <div class="col-md-12 mt-4">
                                    <button type="submit" class="btn btn-md btn-primary btn-block btn-check">CEK ONGKOS KIRIM</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                @if($result)
                <div class="row">
                    @forelse($result as $r)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body text-center">
                                <div>
                                    {{$nama_jasa}}
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-12">
                                        <strong style="color:red">Rp {{number_format($r['biaya'])}}</strong>
                                        <br />
                                        <strong>{{$r['etd']}} Hari</strong>
                                        <br />
                                        <strong>{{$r['description']}}</strong>
                                    </div>
                                </div>
                                <button class=" btn btn-sm btn-success" wire:click="save_ongkir({{$r['biaya']}})">
                                    Tambah sebagai ongkir
                                </button>
                               
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>







