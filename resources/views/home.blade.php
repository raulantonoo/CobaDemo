
 @extends('master.master-admin')

@section('content')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">Dashboard</div>
                    
                 

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    HALLO ADMIN FERRIBANDIT SELAMAT DATANG
                    <BR></BR>
                    HAVE A NICE DAY 
                </div>
            </div>
        </div>
        <img src="{{ asset('../images/ferribandit.png') }}" width = 500px;>
    </div>
</div>
@endsection
