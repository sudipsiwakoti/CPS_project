@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Welcome to the Course Planning System!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p> This web application provides users with the capability to develop a timetable for their subjects for
                    preparation and the reduction of stress in their university career. </p>
                    <p> The <a href="{{ url('/planning') }}">Planning </a> page will showcase the app's main feature
                        of being able to structure a course plan based on your preferences </p>
                    <p> The <a href="{{ url('/subjects') }}">Subjects</a> page will allow you to search for subjects </p>
                    <p> The <a href="{{ url('/courses') }}">Courses</a> page will allow you to search for courses </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
