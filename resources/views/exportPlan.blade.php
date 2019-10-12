
@extends('layouts.app')

@section('content')
    <table class="table">
        <a href = "{{url('exportPlan/pdf')}}" class="btn btn-danger">Print</a>
        <thead>
            <tr>
                <th>
                    Subject ID
                </th>
                <th>
                    Subject Name
                </th>
                <th>
                    Semester
                </th>
                <th>
                    Credit Points
                </th>
                <th>
                    Status
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($enrolments as $enrolment)
                <tr>
                    <td>{{$enrolment-> subjectID}}</td>
                    <td>{{$enrolment-> subjectName}}</td>
                    <td>{{$enrolment-> semester}}</td>
                    <td>{{$enrolment-> creditPoints}}</td>
                    <td>{{$enrolment-> status}}</td>

                </tr>
                @endforeach
        </tbody>
    </table>
    @endsection

