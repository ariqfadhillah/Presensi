@extends('layouts.master')

@section('content')
<div class="main">
	<div class="main-content">
		@if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
		@endif
	</div>
</div>

@stop