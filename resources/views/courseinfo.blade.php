@extends('layouts.app')

@section('content')

<div class ="container">
	<div class="row">
		<div class="card">
			<div class="card-header">{{$details->courseID}} {{$details->courseName}}</div>
			<div class="card-body">
				<b> Overview </b>
				<p></p>
				<p>{{$details->courseDesc}}</p>
				<p></p>
				<p> <b> Course Structure </b></p>
				@include('coursestruc')
			</div>
		</div>
	</div>
		
</div>

@endsection