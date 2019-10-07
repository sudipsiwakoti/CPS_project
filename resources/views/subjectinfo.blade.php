@extends('layouts.app')

@section('content')

<div class ="container">
	<div class="row">
		<div class="card">
			<div class="card-header">{{$details->subjectID}} {{$details->subjectName}}</div>
			<div class="card-body">
				<p> 6 credit points; </p>
				<p> Subject level: Undergraduate </p>
				<p><b> Requisite(s):  </b></p>
				<p><b> Anti-requisite(s):  </b></p>
				<b> Description </b>
				<p></p>
				<p>{{$details->subjectDesc}}</p>
			</div>
		</div>
	</div>
		
</div>

@endsection