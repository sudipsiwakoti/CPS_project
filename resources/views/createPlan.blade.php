@extends('layouts.app')

@section('content')

<div class="container">
    <p>You have not yet created a plan. Please select your course</p>
    <form action="/planning/create" method="POST" role="search">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search courses"> <span class="input-group-btn">
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
                <th>Course ID</th>
                <th>Course Name</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr class="table-tr mycursor" onclick="window.location='{{ route("pCreate",array($user->courseID)) }}'">
                <td>{{$user->courseID}}</td>
                <td>{{$user->courseName}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection