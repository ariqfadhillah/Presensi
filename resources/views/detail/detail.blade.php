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
							<table id="table_id" class="display">
								<thead>
									<tr>
										<th>Waktu Absen</th>
										<th>Pin </th>
									</tr>
								</thead>
								<tbody>
									<!-- @foreach($presensi as $index => $pres)
									<tr>
										<td>{{$pres->time}}</td>
										<td>{{$pres->pin}}</td>
									</tr>
									@endforeach -->
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
  $(function() {
        $('#table_id').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: "{{route('ajaxDetail') }}",
            columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'time', name: 'time'},
            {data: 'pin', name: 'pin'}
        ]
        });
    });

</script>
@stop