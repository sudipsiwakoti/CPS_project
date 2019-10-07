@extends('layouts.app')

@section('content')

<div class ="container">
	<div class="row">
		<div class="card">
			<div class="card-header">{{$details->courseID}} {{$details->courseName}}</div>
			<div class="card-body">
				{{$details->courseDesc}}
			</div>
		</div>
	</div>
		
</div>

@endsection