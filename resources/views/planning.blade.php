{{-- This view shows the primary feature of the app by providing users with the planning capability of assigning subjects to semesters --}}
@extends('layouts.app')

@section('content')
    <div class="col-md-10" align="right">
        <a href="{{ url('dynamic_pdf') }}" class="btn btn-danger">Print Plan</a>
    </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Course Plan for Course {{$details[0]->courseID}}</div>

                <div class="table-responsive-md">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="table-responsive">
                    <table  class="table", width="100%" >
                    <col width="20%">
                    <col width="40%">
                    <col width="20%">
                    <col width="20%">
                    <thead class="thead-dark", align="left">
                        <tr>
                            <th>Semester</th>
                            <th>Subjects</th>
                            <th>Sem Total Credit Points</th>
                            <th>Cumulative Credit Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        @php $TCP = 0 @endphp
                        @foreach($semesters as $semester)
                        <td>{{$semester->semester}}</td>
                        @php $CP=0; @endphp
                                <td>
                        @foreach($currentEnrolments as $enrolment)
                        @if($enrolment->semester == $semester->semester)
                        @php $TCP = $TCP + $enrolment->creditPoints @endphp
                        @php $CP = $CP + $enrolment->creditPoints @endphp


                            <a class="mycursor", onclick="window.location='subject/{{$enrolment->subjectID}}';">{{$enrolment->subjectID}} - {{$enrolment->subjectName}}</a>
                            <br>{{$enrolment->status}}<br>
                            <input class = "btn btn-secondary" type="button" formmethod="post" value="Remove" onclick="window.location='{{ route("pRemove",array($enrolment->subjectEnrolmentID)) }}'"><br><br>
                            @endif
                            @endforeach
                        </td>

                        <td>@php echo $CP @endphp</td>
                        <td>@php echo $TCP @endphp</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                    </div>
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
                        @php $sem = 0 @endphp
                        @if ($subjectOffering->subjectID == $subject->subjectID)
                        @foreach ($semCPs as $semCP)
                        @if (($subjectOffering->semester == $semCP->sem) & !$semCP->enrollable)
                        @php $sem = $semCP->sem @endphp
                        <td><input type="button" formmethod="post" disabled="true" value={{$subjectOffering->semester}}></td>
                        @elseif (($subjectOffering->semester == $semCP->sem) & $semCP->enrollable)
                        @php $sem = $semCP->sem @endphp
                        <td><input type="button" formmethod="post" value={{$subjectOffering->semester}} onclick="window.location='{{ route("pAdd",array($details[0]->planID,$subjectOffering->subjectID,$subjectOffering->semester)) }}'"></td>
                        @endif
                        @endforeach
                        @if ($subjectOffering->semester != $sem)
                        <td><input type="button" formmethod="post" value={{$subjectOffering->semester}} onclick="window.location='{{ route("pAdd",array($details[0]->planID,$subjectOffering->subjectID,$subjectOffering->semester)) }}'"></td>
                        @endif

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
