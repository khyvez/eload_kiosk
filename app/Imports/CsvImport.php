<?php

namespace App\Imports;

use App\Student;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CsvImport implements ToModel,WithHeadingRow
{
   
    public function model(array $row)
    {

       //dump(date('d-m-Y', \strtotime($row['birthday'])));
       return new Student([
        'organization_id' => Auth::user()->organization_id,
        'name'  =>  $row['name'] ,
        'student_id' =>  $row['id_no'],
        'sex'     =>  $row['sex'],
        'program'     =>  $row['program'],
        'year'     =>  $row['year'],
        'age'     =>  $row['age'],
        'birthday'     =>   date('Y-m-d', \strtotime($row['birthday']))  ,
        'block'     =>  $row['block'],
        'contact'     =>  $row['cp'],
        ]);
    }
}
