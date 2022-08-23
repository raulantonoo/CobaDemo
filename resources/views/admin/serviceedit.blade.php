@extends('master.master-admin')

@section('content')

<h3>Edit service</h3>
 
	<a href="/service"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($service as $k)
	<form action="/service/updateservice" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $k->id }}"> <br/>

        <div class="form-group">
	    	<label>JUDUL</label> 
            <input type="text" required="required" class="form-control" name="judul" value="{{ $k->judul }}"> 
        </div>

        <div class="form-group">
	    	<label>KETERANGAN</label> 
            <input type="text" required="required" class="form-control" name="keterangan" value="{{ $k->keterangan }}"> 
        </div>


		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>
</html>

@endsection

