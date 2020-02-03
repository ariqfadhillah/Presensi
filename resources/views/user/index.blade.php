@extends('layouts.master')

@section('content')

<div class="main">
	<div class="main-content">
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
		@endif
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="panel">
						<div class="panel-heading">
							<h3 class="panel-title">DATA USER MESIN PRESENSI</h3>
							<div class="right">
								<button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal">Tambah</i></button>
							</div>
							
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="datatable">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama </th>
										<th>Email / Username </th>
										<th>Role</th>
										<th>Aksi</th>
										<th>    </th>
									</tr>
								</thead>
								<tbody>

									@foreach($query as $index=>$mesin)
									<tr>
										<td>{{$index +1}}</td>
										<td>{{$mesin->name}}</td>
										<td>{{$mesin->email}}</td>
										<td>{{$mesin->role}}</td>


										<td><a href="/users/{{$mesin->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
										<td><a href="/users/{{$mesin->id}}/delete" class="btn btn-danger btn-sm" 
											onclick="return confirm('Yakin ini dihapus ?')">Delete</a></td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


		<div class="row">
			<div class="col-6">
				<h1></h1>
			</div>
			<div class="col-6">
				<!-- Button trigger modal -->

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Tambah Data Mesin Presensi</h5>
							</div>
							<div class="modal-body">
								<form action="/users/create" method="post">
									{{csrf_field()}}
									<div class="form-group">
										<label for="exampleInputEmail1">Nama Lengkap</label>
										<input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap">
										</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Email</label>
										<input name="email" type="email" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Masukan Email">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Password</label>
										<input name="password" type="password" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Masukan Password">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Jenis Kelamin</label>
										<select name="role" class="form-control">
											<option value="admin">Admin</option>
											<option value="user">User</option>
										</select>
									</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary btn-sm">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>	
		</div>

@stop

@section('footer')
<script>
	$(document).ready( function () {
    $('#datatable').DataTable();
} );

</script>
@stop