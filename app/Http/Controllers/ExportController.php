<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Exports\AssignSurveyExport;
use App\AssignSurvey;

class ExportController extends Controller
{
    public function export()
    {
    	return Excel::download(new AssignSurveyExport, 'AssignSurvey.xlsx');
    }
}
