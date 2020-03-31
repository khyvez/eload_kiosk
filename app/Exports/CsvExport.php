<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class CsvExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::all('name', 'student_id', 'sex', 'program', 'year', 'age', 'birthday', 'block', 'contact');
    }
    public function headings(): array

    {

        return [

            'name',
            'id_no',
            'sex',
            'program',
            'year',
            'age',
            'birthday',
            'block',
            'cp'

        ];

    }
}
