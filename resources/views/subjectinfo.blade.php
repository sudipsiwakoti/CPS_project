@extends('layouts.app')

@section('content')

<div class ="container">
	<div class="row">
		<div class="card">
			<div class="card-header">{{$details->subjectID}} {{$details->subjectName}}</div>
			<div class="card-body">
				{{$details->subjectDesc}}
			</div>
		</div>
	</div>
		
</div>

@endsection