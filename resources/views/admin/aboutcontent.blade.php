@extends('master.master-admin')

@section('content')

<style>
    h1 {
        font-size: 25px;
        font-weight: bold;
    }
</style>

<h1>ABOUT CONTENT</h1>

<div class>
    <a href="/aboutcontentadd"><button class="btn btn-info" style="margin-bottom:10px;">ADD aboutcontent</button></a>

    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Tabel aboutcontent</h5>
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
                @foreach($aboutcontent as $c)
                <tr>
                    
                    <td>{{$c->judul}}</td>
                    <td>{{$c->keterangan}}</td>
                    <td><img width="100px" src="{{ url('/images/'.$c->gambar) }}"></td>
                    
                 
                   
                     <td><a href="/aboutcontent_delete/{{ $c->id }}"><button class="btn btn-danger">DELETE</button> </a> </td>  
                     <td><a href="/aboutcontentedit/{{ $c->id }}"><button class="btn btn-info">EDIT</button></a></td>

                @endforeach
            </tbody>
						</table>
					</div>
				</div>
 

    @endsection