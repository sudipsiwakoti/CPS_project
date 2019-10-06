@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Course Plan for course {{$details[0]->courseID}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                </div>
            </div>
            <div class="card">
                <div class="card-header">Subjects to Plan for course {{$details[0]->courseID}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($subjects as $subject)
                        {{$subject->subjectID}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
