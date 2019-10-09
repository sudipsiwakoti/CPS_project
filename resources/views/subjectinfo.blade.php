@extends('layouts.app')

@section('content')

<div class ="container">
	<div class="row">
		<div class="card">
			<div class="card-header">{{$details->subjectID}} {{$details->subjectName}}</div>
			<div class="card-body">
				@php
					$preq = DB::table('prerequisites')->join('subjects','subjects.subjectID','=','prerequisites.subjectID')->get();
					$preq = $preq->unique('subjectID');
				@endphp
				<p> {{$details->creditPoints}} credit points; </p>
				<p> Subject level: Undergraduate </p>
				<p><b> Requisite(s): </b>
				@foreach($preq as $req)
					@if ($req->subjectID === $details->subjectID)
						@php
							$tmp = DB::table('subjects')->where('subjectID','=',$req->prerequisiteID)->get();
							$tmp = $tmp->unique('subjectID');
						@endphp 
						<a class="mycursor", onclick="window.location='{{$req->prerequisiteID}}';">
							{{$req->prerequisiteID}} {{$tmp[0] -> subjectName}} </a> 
					@endif
				@endforeach
				</p>
				<p><b> Anti-requisite(s):  </b></p>
				<b> Description </b>
				<p></p>
				<p>{{$details->subjectDesc}}</p>
			</div>
		</div>
	</div>
		
</div>

@endsection