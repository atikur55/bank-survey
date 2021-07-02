<?php

namespace App\Exports;

use App\AssignSurvey;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AssignSurveyExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return AssignSurvey::all();
    // }
     public function collection()
    {
        return AssignSurvey::orderBy('id','asc')->select('id','agent_name', 'filename','file_type','task','date')->get();
    }

    public function headings() :array
    {
        return ["ID","Agent ID", "File Name","File Type","Task","Date"];
    }
}
