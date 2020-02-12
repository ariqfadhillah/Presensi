@extends('layouts.master')

@section('content')
<div class="main">
	<div class="main-content">
		<div class="container-fluid">
			@if(session('sukses'))
			<div class="alert alert-success" role="alert">
				{{session('sukses')}}
			</div>
			@endif
			<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Dashboard</h3>
							<p class="panel-subtitle">Last Update: 
								<span id="datetime"></span>&nbsp<span id="datetimes"></span></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<div class="metric">
										<span class="icon"><i class="fa fa-download"></i></span>
										<p>
											<span class="number">{{totalMesin()}}</span>
											<span class="title">Mesin Presensi</span>
										</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="metric">
										<span class="icon"><i class="fa fa-shopping-user"></i></span>
										<p>
											<span class="number">{{totalPengguna()}}</span>
											<span class="title">Pengunjung</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
	</div>
</div>

@stop
@section('footer')

<script>
		n =  new Date();
		y = n.getFullYear();
		m = n.getMonth() + 1;
		d = n.getDate();
		j = n.getHours()+1;
		t = n.getMinutes()+1;
		document.getElementById("datetime").innerHTML = d + "/" + m + "/" + y;
		document.getElementById("datetimes").innerHTML = j + ":" + t;
</script>

@stop