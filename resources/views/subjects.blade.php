@extends('layouts.app')

@section('content')

    <form action="/searchSubjects" method="POST" role="search">
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
    </form>

    <div class="container">
        @if(isset($details))
            <p> </p>
            <p> The search results for your query <b> {{ $query }} </b> are :</p>
            <table class="table table-striped">
                <thead>
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th>Subject ID</th>
                        <th>Subject Name</th>
                        <th>Subject credit points</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($details as $user)
                        <tr>
                        <tr class="table-tr" onclick="window.location='{{$user->subjectID}}';">
                            <td>{{$user->subjectID}}</td>
                            <td>{{$user->subjectName}}</td>
                            <td>{{$user->subjectCreditPoints}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        @endif
    </div>
@endsection
