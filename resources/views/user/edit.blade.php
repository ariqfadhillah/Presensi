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
							<h3 class="panel-title">EDIT DATA USER MESIN PRESENSI</h3>
						</div>
						<div class="panel-body">
							<form action="/users/{{$query->id}}/update" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Lengkap</label>
									<input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" value="{{$query->name}}">
									</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Email</label>
									<input name="email" type="email" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Masukan Email" value="{{$query->email}}">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1" class="outline">Pilih Role</label>
								
								<select name="role" class="form-control">
									<option value="admin" @if($query->role == 'admin') selected @endif>admin</option>
									<option value="user" @if($query->role == 'user') selected @endif>user</option>
								</select>
								</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-warning">Update</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('content1')

		
		<div class="row">
			<div class="col-lg-12">
			
		</div>
	</div>
@endsection