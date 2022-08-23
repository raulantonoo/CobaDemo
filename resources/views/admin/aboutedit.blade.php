@extends('master.master-admin')

@section('content')

<h3>Edit about</h3>
 
	<a href="/about"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($about as $c)
	<form action="/about/updateabout" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $c->id }}"> <br/>

        <div class="form-group">
	    	<label>JUDUL</label> 
            <input type="text" required="required" class="form-control" name="judul" value="{{ $c->judul }}"> 
        </div>

        <div class="form-group">
	    	<label>KETERANGAN</label> 
            <input type="text" required="required" class="form-control" name="isi" value="{{ $c->isi }}"> 
        </div>


		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>
</html>

@endsection

