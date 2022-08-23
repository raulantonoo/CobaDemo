@extends('layouts.app')

@section('content')


<div class="container">
  <div class="row">
    <div class="col col-12 mb-2">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col">
              Alamat Pengiriman
            </div>
            <div class="col-auto">
              <a href="{{ URL::to('checkout') }}" class="btn btn-sm btn-danger">
                Tutup
              </a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-stripped">
              <thead>
                <tr>
                  <th>Nama Penerima</th>
                  <th>Alamat</th>
                  <th>No tlp</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($itemalamatpengiriman as $pengiriman)
                <tr>
                  <td>
                    {{ $pengiriman->nama_penerima }}
                  </td>
                  <td>
                    {{ $pengiriman->alamat }}<br />
                    {{ $pengiriman->kelurahan}}, {{ $pengiriman->kecamatan}}<br />
                    {{ @$pengiriman->city->name}}, {{ @$pengiriman->province->name}} - {{ $pengiriman->kodepos}}
                    <!-- {{ @$pengiriman->city_id}}, {{ @$pengiriman->province_id}} - {{ $pengiriman->kodepos}} -->
                  </td>
                  <td>
                    {{ $pengiriman->no_tlp }}
                  </td>
                  <td>
                    <form action="{{ route('alamatpengiriman.update',$pengiriman->id) }}" method="post">
                      @method('patch')
                      @csrf()
                      @if($pengiriman->status == 'utama')
                      <button type="submit" class="btn btn-primary btn-sm" disabled>Set Utama</button>
                      @else
                      <button type="submit" class="btn btn-primary btn-sm">Set Utama</button>
                      @endif
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="col col-8">
      <div class="card">
        <div class="card-header">
          Form Alamat Pengiriman
        </div>
        <div class="card-body">
          @if(count($errors) > 0)
          @foreach($errors->all() as $error)
          <div class="alert alert-warning">{{ $error }}</div>
          @endforeach
          @endif
          @if ($message = Session::get('error'))
          <div class="alert alert-warning">
            <p>{{ $message }}</p>
          </div>
          @endif
          @if ($message = Session::get('success'))
          <div class="alert alert-success">
            <p>{{ $message }}</p>
          </div>
          @endif
          <form action="{{ route('alamatpengiriman.store') }}" method="post">
            @csrf()
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="nama_penerima">Nama Penerima</label>
                  <input type="text" name="nama_penerima" class="form-control" value={{old('nama_penerima') }}>
                </div>
                <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat" class="form-control" value={{old('alamat') }}>
                </div>
                <div class="form-group">
                  <label for="no_tlp">No Tlp</label>
                  <input type="text" name="no_tlp" class="form-control" value={{old('no_tlp') }}>
                </div>

                <div class="form-group">
                  <label for="title">Provinsi</label>
                  <select name="province_id" class="form-control" style="width:350px">
                    <option value="">--- Select State ---</option>
                    @foreach ($province as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="title">Kota</label>
                  <select name="city_id" class="form-control" style="width:350px">
                  </select>
                </div>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
                <script type="text/javascript">
                  $(document).ready(function() {
                    $('select[name="province_id"]').on('change', function() {
                      var province_id = $(this).val();
                      if (province_id) {
                        $.ajax({
                          url: '/alamatpengiriman/ajax/' + province_id,
                          type: "GET",
                          dataType: "json",
                          success: function(data) {


                            $('select[name="city_id"]').empty();
                            $.each(data, function(key, value) {
                              $('select[name="city_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });


                          }
                        });
                      } else {
                        $('select[name="city_id"]').empty();
                      }
                    });
                  });
                </script>


                <div class="form-group">
                  <label for="kecamatan">Kecamatan</label>
                  <input type="text" name="kecamatan" class="form-control" value={{old('kecamatan') }}>
                </div>
                <div class="form-group">
                  <label for="kelurahan">Kelurahan</label>
                  <input type="text" name="kelurahan" class="form-control" value={{old('kelurahan') }}>
                </div>
                <div class="form-group">
                  <label for="kodepos">Kodepos</label>
                  <input type="text" name="kodepos" class="form-control" value={{old('kodepos') }}>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection