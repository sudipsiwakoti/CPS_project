@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Course Plan for course {{$details[0]->courseID}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                    <col width="10%">
                    <col width="70%">
                    <col width="10%">
                    <col width="10%">
                    <thead class="thead-dark">
                        <tr>
                            <th>Semester</th>
                            <th colspan="5">Subjects</th>
                            <th>Sem Total Credit Points</th>
                            <th>Cumulative Credit Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @foreach($semesters as $semester)
                        <td>{{$semester->semester}}</td>                        
                        @foreach($currentEnrolments as $enrolment)
                        @if($enrolment->semester == $semester->semester)
                        <td>
                            <a class="mycursor", onclick="window.location='subject/{{$enrolment->subjectID}}';">{{$enrolment->subjectID}}<br>{{$enrolment->subjectName}}</a>
                            <br>{{$enrolment->status}}<br>
                            <input type="button" formmethod="post" value="[X]" onclick="window.location='{{ route("pRemove",array($enrolment->subjectEnrolmentID)) }}'">
                        </td>
                        @endif
                        @endforeach
                        </tr>                        
                        @endforeach

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
                    <th>Credit Pts</th>
                    <th colspan="7">Offerings</th>
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
                        <td class="mycursor", onclick="window.location='subject/{{$subject->subjectID}}';">{{$subject->subjectID}}</td>
                        <td class="mycursor", onclick="window.location='subject/{{$subject->subjectID}}';">{{$subject->subjectName}}</td>
                        <td class="mycursor", onclick="window.location='subject/{{$subject->subjectID}}';">{{$subject->creditPoints}}</td>
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
