<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subjectenrolment;
use App\Plan;
use DB;
use PDF;
use Auth;


class DynamicPDFController extends Controller
{
    function index()
    {
        $plan = Plan::where('userID','=',Auth::user()->id)->get();
        $myEnrolments = DB::table('Subjectenrolment')
            ->join('subjects','subjectEnrolment.subjectID','=','subjects.subjectID')
            ->whereIn('planID',$plan->pluck('planID'))->select('Subjectenrolment.*','subjects.subjectName','subjects.creditPoints')->distinct()->get();
        return view('dynamic_pdf', ['enrolments' => $myEnrolments]);
    }

   function get_myEnrolments_data()
    {
        $plan = Plan::where('userID','=',Auth::user()->id)->get();
        $myEnrolments_data = DB::table('Subjectenrolment')
            ->join('subjects','subjectEnrolment.subjectID','=','subjects.subjectID')
            ->whereIn('planID',$plan->pluck('planID'))->select('Subjectenrolment.*','subjects.subjectName','subjects.creditPoints')->distinct()->get();
        return $myEnrolments_data;
    }

    function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_myEnrolments_data_to_html());
        return $pdf->stream();
    }

    function convert_myEnrolments_data_to_html()
    {
        $myEnrolments_data = $this->get_myEnrolments_data();
        $output = '
     <h3 align="center">University of Technology</h3>
     <h4 align="center">Course Plan</h4>
     <table width="100%" style="border-collapse: collapse; border: 0px;">
      <tr>
    <th style="border: 1px solid; padding:12px;" width="20%">Subject ID</th>
    <th style="border: 1px solid; padding:12px;" width="30%">Subject Name</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Semester</th>
    <th style="border: 1px solid; padding:12px;" width="15%">Credit Point</th>
    <th style="border: 1px solid; padding:12px;" width="20%">Status</th>
   </tr>
     ';
        foreach($myEnrolments_data as $enrolments)
        {
            $output .= '
      <tr>
       <td style="border: 1px solid; padding:12px;">'.$enrolments->subjectID.'</td>
       <td style="border: 1px solid; padding:12px;">'.$enrolments->subjectName.'</td>
       <td style="border: 1px solid; padding:12px;">'.$enrolments->semester.'</td>
       <td style="border: 1px solid; padding:12px;">'.$enrolments->creditPoints.'</td>
       <td style="border: 1px solid; padding:12px;">'.$enrolments->status.'</td>
      </tr>
      ';
        }
        $output .= '</table>';
        return $output;
    }
}
