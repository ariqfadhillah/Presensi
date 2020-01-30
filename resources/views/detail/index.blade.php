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
							<h3 class="panel-title">Detail Mesin (NoMesin) (Lokasi)</h3>
							
						</div>
						<div class="panel-body">
							<table class="table table-hover" id="datatable">
								<thead>
									<tr>
										<th>No</th>
										<th>Waktu Absen</th>
										<th>Pin </th>
									</tr>
								</thead>
								<tbody>
									@foreach($detail as $index =>$mesin)
									<tr>
										<td>{{$index +1}}</td>
										<td>{{$mesin->time}}</td>
										<td>{{$mesin->pin}}</td>
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