{{-- This view represents the creation of a plan page --}}
@extends('layouts.app')

@section('content')
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="container">
    <p>You have not yet created a plan. Please select your course</p>
    <form action="/planning/create" method="POST" role="search">
    @csrf
    <div class="input-group">
        <input type="text" class="form-control" name="q"
            placeholder="Search courses"> <span class="input-group-btn">
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
                <th>Course ID</th>
                <th>Course Name</th>
            </tr>
        </thead>

    @if(isset($details))
        <p> </p>
        <p> The search results for your query <b> {{ $query }} </b> are :</p>

        <tbody>
            @foreach($details as $user)
            <tr class="table-tr mycursor" onclick="window.location='{{ route("pCreate",array($user->courseID)) }}'">
                <td>{{$user->courseID}}</td>
                <td>{{$user->courseName}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
            @else
        @php
            $tmp = DB::table('courses')->get();
            $tmp = $tmp->unique('courseID');
        @endphp
        @foreach($tmp as $user)
            <tr class="table-tr mycursor" onclick="window.location='{{ route("pCreate",array($user->courseID)) }}'">
                <td>{{$user->courseID}}</td>
                <td>{{$user->courseName}}</td>
            </tr>
        @endforeach
    @endif
</div>

@endsection