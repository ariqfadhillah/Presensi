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
							<h3 class="panel-title">DATA MESIN PRESENSI</h3>
							@if(auth()->user()->role == 'admin')
							<div class="right">
								<button type="button" class="btn"><i class="lnr lnr-plus-circle" data-toggle="modal" data-target="#exampleModal">Tambah</i></button>
							</div>
							@endif
							
						</div>
						<div class="panel-body">
							<table id="table_id" class="display">
							    <thead>
							        <tr>
										<th>No Mesin </th>
										<th>Lokasi </th>
										<th>Timezone</th>
										@if(auth()->user()->role == 'admin')
										<th>Aksi</th>
										<th>    </th>
										@endif
									</tr>
							    </thead>
							    <tbody>

									<!-- @foreach($data_device as $index =>$mesin)
									<tr>
										<td>{{$index +1}}</td>
										<td>{{$mesin->serialnumber}}</td>
										<td>{{$mesin->location}}</td>
										<td>{{$mesin->timeZoneAdj}}</td> @if(auth()->user()->role == 'admin')
										<td><a href="/presensi/{{$mesin->id}}/edit" class="btn btn-warning btn-sm">Edit</a></td>
										<td><a href="/presensi/{{$mesin->id}}/delete" class="btn btn-danger btn-sm" 
											onclick="return confirm('Yakin ini dihapus ?')">Delete</a></td>
											@endif
									</tr>
									@endforeach -->
								</tbody>
							</table>
							<br>
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
								<form action="/presensi/create" method="post">
									{{csrf_field()}}
									<div class="form-group">
										<label for="exampleInputEmail1">No Mesin</label>
										<input name="serialnumber" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan No-MESIN">
										</div>
									<div class="form-group">
										<label for="exampleInputPassword1">Lokasi</label>
										<input name="location" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Masukan Lokasi MESIN">
									</div>
									<div class="form-group">
										<label for="exampleInputPassword1" style="margin-right: 20px">TimeZone</label>
										<select name="timeZoneAdj" class="form-control">
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
											<option value="3">3</option>
											<option value="4">4</option>
											<option value="5">5</option>
											<option value="6">6</option>
											<option selected>7</option>
											<option value="8">8</option>
											<option value="9">9</option>
											<option value="10">10</option>
											<option value="11">11</option>
											<option value="12">12</option>
											<option value="13">13</option>
											<option value="14">14</option>
											<option value="15">15</option>
											<option value="16">16</option>
											<option value="17">17</option>
											<option value="18">18</option>
											<option value="19">19</option>
											<option value="20">20</option>
											<option value="21">21</option>
											<option value="22">22</option>
											<option value="23">23</option>
										</select>
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
  $(function() {
        $('#table_id').DataTable({
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: "{{route('ajax-presensi')}}",
            columns: [
            // or just disable search since it's not really searchable. just add searchable:false
            {data: 'serialnumber', name: 'serialnumber'},
            {data: 'location', name: 'location'},
            {data: 'timeZoneAdj', name: 'timeZoneAdj'},@if(auth()->user()->role == 'admin')
            {data: 'action', name: 'action', orderable: false, searchable: false},
            {data: 'delete', name: 'delete', orderable: false, searchable: false}@endif
        ]
        });
    })
  	$('.btn-danger').submit(function($presensi){
  		if(!confrim('Anda yakin mau menghapus item ini ?')){
  			event.preventDefault();
  		}
  	});
</script>
@stop