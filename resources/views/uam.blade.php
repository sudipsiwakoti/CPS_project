@extends('layouts.app')

@section('content')


<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <p></p>
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Semester</th>
                <th>Person Responsible</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>        
            <tr>
            @foreach($subjects as $subject)
                <td>{{$subject->subjectID}}</td>
                <td>{{$subject->subjectName}}</td>
                <td>{{$subject->semester}}</td>
                @if ($subject->name == null)
                <td>None assigned</td>
                <td><a href="{{ route('assign', array($subject->subjectID, $subject->semester)) }}" class="btn btn-default">Assign me</a></td>
                @else
                <td>{{$subject->name}}</td>
                <td><a href="{{ route('removeC', array($subject->subjectID, $subject->semester)) }}" class="btn btn-danger">Remove Coordinator</a></td>
                @endif

            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection