@extends('layouts.app')

@section('content')


<div class="container">
    <form action='/results/post' method="POST" role="search">  
@csrf 
<div clas="input-group">

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

                <td><input type="hidden" class="form-control" value={{$subject->subjectEnrolmentID}}> <input type="text" class="form-control" name={{$subject->subjectEnrolmentID}} placeholder={{$subject->grade}}></td>

            </tr>
            @endif
            @endforeach

            @endforeach
        </tbody>
    </table>
        <span class="input-group-button"><button type="submit" class="btn btn-default">
Save</button></span>
</button>
</div>
</form>
</div>

@endsection