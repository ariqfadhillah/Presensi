@extends('layouts.master')

@section('content')
<div class="main">
	<div class="main-content">
		<h1>EDIT DATA MESIN PRESENSI</b></h1>	
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
							<h3 class="panel-title">EDIT DATA MESIN PRESENSI</h3>
						</div>
						<div class="panel-body">
							<form action="/presensi/{{$presensi->id}}/update" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="form-group">
									<label for="exampleInputEmail1">No Mesin</label>
									<input name="serialnumber" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$presensi->serialnumber}}">
									</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Lokasi</label>
									<input name="location" type="text" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$presensi->location}}">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1" class="outline">TimeZone</label>
								
								<select name="timeZoneAdj" class="custom-select">
									<option value="0" @if($presensi->timeZoneAdj == '0') selected @endif>0</option>
									<option value="1" @if($presensi->timeZoneAdj == '1') selected @endif>1</option>
									<option value="2" @if($presensi->timeZoneAdj == '2') selected @endif>2</option>
									<option value="3" @if($presensi->timeZoneAdj == '3') selected @endif>3</option>
									<option value="4" @if($presensi->timeZoneAdj == '4') selected @endif>4</option>
									<option value="5" @if($presensi->timeZoneAdj == '5') selected @endif>5</option>
									<option value="6" @if($presensi->timeZoneAdj == '6') selected @endif>6</option>
									<option selected>7</option>
									<option value="8" @if($presensi->timeZoneAdj == '8') selected @endif>8</option>
									<option value="9" @if($presensi->timeZoneAdj == '9') selected @endif>9</option>
									<option value="10" @if($presensi->timeZoneAdj == '10') selected @endif>10</option>
									<option value="11" @if($presensi->timeZoneAdj == '11') selected @endif>11</option>
									<option value="12" @if($presensi->timeZoneAdj == '12') selected @endif>12</option>
									<option value="13" @if($presensi->timeZoneAdj == '13') selected @endif>13</option>
									<option value="14" @if($presensi->timeZoneAdj == '14') selected @endif>14</option>
									<option value="15" @if($presensi->timeZoneAdj == '15') selected @endif>15</option>
									<option value="16" @if($presensi->timeZoneAdj == '16') selected @endif>16</option>
									<option value="17" @if($presensi->timeZoneAdj == '17') selected @endif>17</option>
									<option value="18" @if($presensi->timeZoneAdj == '18') selected @endif>18</option>
									<option value="19" @if($presensi->timeZoneAdj == '19') selected @endif>19</option>
									<option value="20" @if($presensi->timeZoneAdj == '20') selected @endif>20</option>
									<option value="21" @if($presensi->timeZoneAdj == '21') selected @endif>21</option>
									<option value="22" @if($presensi->timeZoneAdj == '22') selected @endif>22</option>
									<option value="23" @if($presensi->timeZoneAdj == '23') selected @endif>23</option>
								</select>
								</div>
								
							</div>
								<button type="submit" class="btn btn-warning">Update</button>
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