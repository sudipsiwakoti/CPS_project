@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div class="container">
	<form action="/searchSubjects" method="POST" role="search">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search subjects"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="fa fa-search"></span>
            </button>
        </span>
    </div>
	</form>
        <p></p>
        <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
            </tr>
        </thead>

    @if(isset($details))
        <p> </p>
        <p> The search results for your query <b> {{ $query }} </b> are :</p>

        <tbody>
            @foreach($details as $user)
            <tr class="table-tr mycursor" onclick="window.location='subject/{{$user->subjectID}}';">
                <td>{{$user->subjectID}}</td>
                <td>{{$user->subjectName}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        @php
            $tmp = DB::table('subjects')->get();
            $tmp = $tmp->unique('subjectID');
        @endphp
        @foreach($tmp as $user)
            <tr class="table-tr mycursor" onclick="window.location='subject/{{$user->subjectID}}';">
                <td>{{$user->subjectID}}</td>
                <td>{{$user->subjectName}}</td>
            </tr>
        @endforeach
    @endif
</div>

@endsection