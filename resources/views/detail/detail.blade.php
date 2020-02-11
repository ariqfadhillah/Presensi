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
							@foreach($data_device as $id)
							<h3 class="panel-title">Detail Mesin ({{$id->serialnumber}}) ({{$id->location}})</h3>
							@endforeach
						</div>
						<div class="panel-body">
							<div class="dataTables_wrapper no-footer">
								<table id="table_id" class="table table-hover">
								<thead>
									<tr>

										<th>Waktu Absen</th>
										<th>Pin </th>
									</tr>
								</thead>
								<tbody>
									@foreach($presensi as $index => $pres)
									<tr>
										<td>{{$pres->time}}</td>
										<td>{{$pres->pin}}</td>
									</tr>
									@endforeach
								</tbody>
								</table>
								<div class="dataTables_info">
 											Showing  {{ $presensi->firstItem() }} 
 											to  {{ $presensi->lastItem() }} of
 											{{ $presensi->total() }} entries
								</div>
								<div id="table_id_paginate" class="dataTables_paginate paging_simple_numbers">

											{{ $presensi->links() }}
											Show {{ $presensi->perPage() }} entries
								</div>
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
<!-- <script>
$(document).ready( function () {
    $('#table_id').DataTable();
} );
</script> -->
@stop