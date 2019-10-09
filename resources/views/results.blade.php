@extends('layouts.app')

@section('content')

<input type="button" class="btn btn-default" value="Edit Results" onclick="window.location='{{ route("eResults")}}'">

<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <p></p>
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Credit Pts</th>
                <th>Results</th>
            </tr>
        </thead>
        <tbody>        
            @foreach($semesters as $semester)
            <tr>
            @foreach($subjects as $subject)
            @if ($subject->semester == $semester->semester)
                <td>{{$semester->semester}}</td>
                <td>{{$subject->subjectName}}</td>
                <td>{{$subject->creditPoints}}</td>
                <td>{{$subject->grade}}</td>
            @endif
            </tr>
            @endforeach

            @endforeach
        </tbody>
    </table>
</div>

@endsection