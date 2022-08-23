@extends('master.master-admin')

@section('content')


<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-8 col-md-8 mb-2">
          </div>
        </div>
        <div class="card-footer">
        <a href="{{ url()->previous() }}" class="btn btn-sm btn-danger">Back</a>
        </div>
      </div>
    
           
    @foreach($itemorder->cart->detail as $detail)
    @endforeach
    <div class="card">
              <div class="card-header">Bukti Transfer</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table>
                    <TR class="text-center">
                      <td COLSPAN=4>
                        <div class="col-xs-5 col-sm-5 col-md-5">
                          <div class="form-group center mr-auto ml-auto">
                            <img src="/image/{{ $itemorder->cart->bukti_tf }}" width="700px">
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
 
  


@endsection