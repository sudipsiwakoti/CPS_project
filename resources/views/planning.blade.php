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
                    <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>Semester</th>
                            <th>Subjects</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>S1 2019</td>
                        @foreach($currentEnrolments as $enrolment)
                        <td>{{$enrolment->subjectID}}</td>
                        @endforeach
                        </tr>
                    </tbody>
                </table>


                </div>
            </div>
            <div class="card">
                <div class="card-header">Subjects to Plan for course {{$details[0]->courseID}}</div>

                <div class="card-body">
                    <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th>Subject ID</th>
                    <th>Subject Name</th>
                    <th>Offerings</th>
                </tr>
                </thead>
                <tbody>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach($subjects as $subject)
                    <tr class="table-tr">
                        <td>{{$subject->subjectID}}</td>
                        <td>{{$subject->subjectName}}</td>
                        @foreach($subjectOfferings as $subjectOffering)
                        @if ($subjectOffering->subjectID == $subject->subjectID)
                        <td><input type="button" formmethod="post" value={{$subjectOffering->semester}} onclick="window.location='{{ route("pAdd",array($details[0]->planID,$subjectOffering->subjectID,$subjectOffering->semester)) }}'"></td>
                        @endif
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
