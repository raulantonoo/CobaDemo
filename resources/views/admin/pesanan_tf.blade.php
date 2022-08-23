@extends('master.master-admin')

@section('content')



              <tbody>
                @foreach($cart->bukti_tf )
                
            <div class="card">
              <div class="card-header">Bukti Transfer</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table>
                    <TR class="text-center">
                      <td COLSPAN=4>
                        <div class="col-xs-5 col-sm-5 col-md-5">
                          <div class="form-group center mr-auto ml-auto">
                            <img src="/image/{{ $bukti_tf ->bukti_tf }}" width="700px">
                          </div>
                        </div>
                      </td>
                    </TR>
                  </table>
           
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endforeach

@endsection