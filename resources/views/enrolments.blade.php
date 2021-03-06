@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-10" align="right">
        <a href="{{ route('access') }}" class="btn btn-default">Manage Subjects</a>
    </div>
    <table class="table">
        <thead class="thead-dark">
            <p></p>
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Semester</th>
                <th>Places Available</th>
                <th>Students Enrolled</th>
            </tr>
        </thead>
        <tbody>        
            <tr>
            @foreach($subjects as $subject)
                <td>{{$subject->subjectID}}</td>
                <td>{{$subject->subjectName}}</td>
                <td>{{$subject->semester}}</td>
                <td></td>
                <td>{{$subject->nbEnrolments}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection