@extends('layouts.master')

@section('content')
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel panel-profile" style="margin-bottom: 0%;">
				<div class="clearfix">
					<!-- LEFT COLUMN -->
					<div class="profile-left">
						<!-- PROFILE HEADER -->
						<div class="profile-header">
							<div class="overlay"></div>
							<div class="profile-main" style="padding: 57px">
								<img src="{{asset('assets/img/user-medium.png')}}" class="
								img-circle" alt="Avatar" style="max-height: 300px">
								<h3 class="name">{{$query -> name}}</h3>
								<span class="online-status status-available">{{$query -> email}}</span>
							</div>
						</div>
						<!-- END PROFILE HEADER -->
						<!-- PROFILE DETAIL -->
						
						<!-- END PROFILE DETAIL -->
					</div>
					<!-- END LEFT COLUMN -->
					<!-- RIGHT COLUMN -->
					<div class="profile-right">
						<div class="panel">
							<div class="panel-heading">
								<h3 class="panel-title">Detail Data Anda</h3>
							</div>
							<div class="panel-body">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>KODE</th>
											<th>ROLE</th>
											<th>NAMA</th>
											<th>TERDAFTAR PADA</th>
										</tr>
									</thead>
									<tbody>

										<tr>
											<td>{{$query -> id}}</td>
											<td>{{$query -> role}}</td>
											<td>{{$query -> name}}</td>
											<td>{{$query -> created_at}}</td>
										</tr>

									</tbody>
								</table>
							</div>
							<div class="panel-footer">
									<div class="row">
										
										<div class="col-md-12 text-right"><a href="#" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">Edit Data</a></div>
									</div>
								</div>
						</div>
					</div>
					<!-- END RIGHT COLUMN -->
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
								<h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
							</div>
							<div class="panel-body">
								<form action="/users/{{$query->id}}/update_setting" method="post" enctype="multipart/form-data">
									{{csrf_field()}}

									<div class="form-group">
										<label for="exampleInputEmail1">Nama Lengkap</label>
										<input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Nama Lengkap" value="{{$query->name}}">
										@if($errors->has('name'))
										<span class="help-block alert-danger">{{$errors->first('name')}}</span>
										@endif
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Email</label>
										<input name="email" type="email" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Masukan Email" value="{{$query->email}}">
										@if($errors->has('email'))
										<span class="help-block alert-danger">{{$errors->first('email')}}</span>
										@endif
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary btn-sm">Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>



</div>
<!-- END MAIN CONTENT -->
</div>

@stop