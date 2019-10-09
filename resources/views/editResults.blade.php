@extends('layouts.app')

@section('content')


<div class="container">
    <form action={{ route("eResults")}} method="POST" role="search">  
@csrf 
<button type="submit" class="btn btn-default">
    <span class="glyphicon glyphicon-save">Save</span>
</button>
    <table class="table">
        <thead class="thead-dark">
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

                <td><input type="text" class="form-control" name={{$subject->subjectEnrolmentID}}
                placeholder={{$subject->grade}}></td>

            </tr>
            @endif
            @endforeach

            @endforeach
        </tbody>
    </table>
</form>
</div>

@endsection