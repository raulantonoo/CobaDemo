@extends('layouts.app')

@section('content')


<div class="container" style="margin-top:3%">
  <div class="row">
    <div class="col col-md-8">
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
      <div class="card bg-white">
        <div class="card-header " style="background-color:#d7dbd8;color:#1a1a1c">
          <div class="ml-auto" style="float:left">
            Item
          </div>
          <button class="btn btn-primary ml-auto" style="float:right"><a style="color:white" href="/transaksi">Riwayat Transaksi</a></button>
        </div>

        <div class="card-body">
          <table class="table table-stripped">
            <thead>
              <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @if(!empty($itemcart))
              @foreach($itemcart->detail as $detail)
              <tr>
                <td>
                  <input name="cekcek" data-id="{{$detail->id}}" name="id[]" value="{{$detail->subtotal}}" class="toggle-class" type="checkbox" {{ $detail->status ? 'checked' : '' }}>
                </td>

                </td>
                <td> <img src="{{ url('/images/'.$detail->produk->gambar) }}" style="margin:7%; width:100px" class="img-fluid" alt=""></td>
                <td>
                  {{ $detail->produk->nama_brg }}
                  <br />
                  {{ $detail->produk->kode_produk }}
                </td>
                <td>
                  {{ number_format($detail->harga, 2) }}
                </td>

                <td>
                  <div class="btn-group" role="group">
                    <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                      @method('patch')
                      @csrf()
                      <input type="hidden" name="param" value="kurang">
                      <button class="btn btn-primary btn-sm">
                        -
                      </button>
                    </form>
                    <button class="btn btn-outline-primary btn-sm" disabled="true">
                      {{ number_format($detail->qty, 2) }}
                    </button>
                    <form action="{{ route('cartdetail.update',$detail->id) }}" method="post">
                      @method('patch')
                      @csrf()
                      <input type="hidden" name="param" value="tambah">
                      <button class="btn btn-primary btn-sm">
                        +
                      </button>
                    </form>
                  </div>
                </td>
                <td>
                  {{ number_format($detail->subtotal, 2) }}
                </td>
                <td>
                  <form action="{{ route('cartdetail.destroy', $detail->id) }}" method="post" style="display:inline;">
                    @csrf
                    {{ method_field('delete') }}
                    <button type="submit" class="btn btn-sm btn-danger mb-2">
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- <div id="msg" style="color:black; font-size:30px; margin-right: 30px;">  </div> -->
          <!-- <button type="submit" class="btn btn-sm btn-danger mb-2">
            BAYAR GESSS
          </button> -->
        </div>
      </div>
    </div>
    <div class="col col-md-4">
      <div class="card bg-white">
        <div class="card-header" style="background-color:#d7dbd8;color:#1a1a1c">
          Ringkasan
        </div>
        <div class="card-body">
          <table class="table">
            <tr>
              <td>No Invoice</td>
              <td class=" text-right">
                {{ $itemcart->no_invoice }}
              </td>
            </tr>

            <tr>
              <td>Subtotal</td>
              <td class=" text-right">
              <div id="msg">
            Rp {{number_format ($itemcart->subtotal)}},00

              </div>
              </td>
            </tr>
          </table>
        </div>
        <div class="card-footer">
          <div class="row">
           
            <div class="col">
              <a href="{{ URL::to('checkout') }}" class="btn btn-primary btn-block">
                Checkout
              </a>
            </div>
            
            <div class="col">
              <form action="{{ url('kosongkan').'/'.$itemcart->id }}" method="post">
                @method('patch')
                @csrf()
                <button type="submit" class="btn btn-danger btn-block">Kosongkan</button>
              </form>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(function() {
    $('.toggle-class').change(function() {
      var status = $(this).prop('checked') == true ? 1 : 0;
      var detail_id = $(this).data('id');
      $.ajax({
        type: "GET",
        dataType: "json",
        url: '/status',
        data: {
          'status': status,
          'detail_id': detail_id
        },
        success: function(data) {
          console.log(data.success)
        }
      });
    });
  });
  $('input:checkbox').change(function() {
    var subtotal = 0;

    $('input:checkbox:checked').each(function() {
      subtotal += isNaN(parseInt($(this).val())) ? 0 : parseInt($(this).val());
    });
    console.log(subtotal)
    $("#subtotal").val(subtotal);
    $.ajax({
      type: "POST",
      dataType: "json",
      url: '/updatesubtotal',
      data: {
        '_token': "{{ csrf_token() }}",
        'subtotal': subtotal
      },
      success: function(data) {
        console.log(data.success)
      }
    });
  
    document.getElementById("msg").innerHTML = "Rp " + subtotal + ",00";
  });
</script>

@endsection