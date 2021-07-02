<?php

namespace App\Imports;

use App\AssignSurvey;
use Maatwebsite\Excel\Concerns\ToModel;

class AssignSurveyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new AssignSurvey([
            'agent_name'     => @$row[0],
            'filename'    => @$row[1], 
            'file_type'    => @$row[2],
            'zone'    => @$row[3],
            'area_id'    => @$row[4],
            'task'    => @$row[5],
            'date'    => @$row[6],
        ]);
    }
}
