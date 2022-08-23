@extends('layouts.app')

@section('content')



    <form action="/buktitf/update" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="bukti_tf" class="form-control" placeholder="image">
                    <img src="/image/{{ $cart->bukti_tf }}" width="300px">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     
    </form>
@endsection