@extends('master.master-admin')

@section('content')

<style>
    h1 {
        font-size: 25px;
        font-weight: bold;
    }
</style>

<h1>SERVICE</h1>

<div class>
    <a href="/serviceadd"><button class="btn btn-info" style="margin-bottom:10px;">ADD SERVICE</button></a>

    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Tabel service</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					<div class="card-body">
						
					</div>

					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr class="bg-blue">
									
									<th>JUDUL</th>
									<th>KETERANGAN</th>
									<th>GAMBAR</th>
									<th></th>
                                    <th>OPSI</th>
								</tr>
							</thead>
                            <tbody>
                @foreach($service as $k)
                <tr>
                    
                    <td>{{$k->judul}}</td>
                    <td>{{$k->keterangan}}</td>
                    <td><img width="100px" src="{{ url('/images/'.$k->gambar) }}"></td>
                 
                   
                    
                    <td><a href="/service_delete/{{ $k->id }}"><button class="btn btn-danger">DELETE</button></a></td>
                    <td><a href="/serviceedit/{{ $k->id }}"><button class="btn btn-info">EDIT</button></a></td> 
                @endforeach
            </tbody>
						</table>
					</div>
				</div>
 

    @endsection