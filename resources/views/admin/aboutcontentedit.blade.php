@extends('master.master-admin')

@section('content')

<h3>Edit about</h3>
 
	<a href="/aboutcontent"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($aboutcontent as $c)
	<form action="/aboutcontent/updateaboutcontent" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $c->id }}"> <br/>
		
        <div class="form-group">
	    	<label>JUDUL</label> 
            <input type="text" required="required" class="form-control" name="judul" value="{{ $c->judul }}"> 
        </div>

        <div class="form-group">
	    	<label>KETERANGAN</label> 
            <input type="text" required="required" class="form-control" name="keterangan" value="{{ $c->keterangan }}"> 
        </div>


		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>
</html>

@endsection

