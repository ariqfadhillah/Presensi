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
							<h3 class="panel-title">REKAP TRANSAKSI </h3>
							
						</div>
						<div class="panel-body">
							<table id="table_id" class="display">
								<thead>
									<tr>
										<th>No</th>
										<th>No Mesin </th>
										<th>Lokasi </th>
										<th>Jumlah Masuk</th>
									</tr>
								</thead>
								<tbody>

									@foreach($device as $index =>$transaksi)
									<tr>
										<td>{{$index +1}}</td>
										<td><a href="/detail/{{$transaksi->serialnumber}}/show">{{$transaksi->serialnumber}}</a></td>
										<td><a href="/detail/{{$transaksi->serialnumber}}/show">{{$transaksi->location}}</a></td>

										<td>  <p>{{ $transaksi->type_count }} Absen</p>
										</td>
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

@stop

@section('footer')
<script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );

</script>
@stop