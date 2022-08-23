
@extends('master.master-admin')

@section('content')
<style>
    h1 {
        font-size: 25px;
        font-weight: bold;
    }
</style>

<h1>USER ACCOUNT</h1>

    <div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">Tabel User</h5>
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
									
									
									<th>NAMA</th>
									<th>EMAIL</th>
                                    <th>ROLE</th>
									<th>No HP</th>

								</tr>
							</thead>

                            @foreach($user as $k)
                <tr>
                    <td>{{$k->name}}</td>
                    <td>{{$k->email}}</td>
					<td>{{$k->role}}</td>
                    <td>{{$k->no_hp}}</td>
                    
                   
                 
                   
                    
                 
                </tr>
                @endforeach
						</table>
					</div>
				</div>
 

    @endsection

   