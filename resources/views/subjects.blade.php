@extends('layouts.app')

@section('content')

<div class="container">
	<form action="/searchSubjects" method="POST" role="search">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search subjects"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search"></span>
            </button>
        </span>
    </div>
	</form>

    @if(isset($details))
        <p> </p>
        <p> The search results for your query <b> {{ $query }} </b> are :</p>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr class="table-tr" onclick="window.location='{{$user->subjectID}}';">
                <td>{{$user->subjectID}}</td>
                <td>{{$user->subjectName}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection