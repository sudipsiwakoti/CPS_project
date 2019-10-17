<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<br />
<div class="container">
    <h3 align="center">UNIVERSITY OF TECHNOLOGY SYDNEY</h3><br />

    <div class="row">
        <div class="col-md-7" align="right">
            <h3>Course Plan</h3>
        </div>
        <div class="col-md-5" align="right">
            <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Print</a>
        </div>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Subject ID</th>
                <th>Subject Name</th>
                <th>Semester</th>
                <th>Credit Points</th>
                <th>Status</th>
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
    </div>
</div>
</body>
</html>
