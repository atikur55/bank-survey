<?php

namespace App\Imports;

use App\FileCAUpload;
use Maatwebsite\Excel\Concerns\ToModel;

class FileUploadCA implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new FileCAUpload([
            'filename'     => @$row[0],
            'agent_name'    => @$row[1], 
            'receving_date'    => @$row[2],
            'submission_date'    => @$row[3],
            'task'    => @$row[4],
            'phone'    => @$row[5],
        ]);
    }
}
