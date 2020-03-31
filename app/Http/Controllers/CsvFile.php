<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CsvImport;
use App\Exports\CsvExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;


class CsvFile extends Controller
{
    public function importExportView()
    {
       return view('csv_file');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
      
        return Excel::download(new CsvExport, 'students.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
       try{
     Excel::import(new CsvImport,request()->file('file'));
    // Excel::import(new CsvImport, '1.xlsx');

      }catch(\ErrorException $ex){
       
            return back()->withError("Error in Excel File");
    }   catch(\Exception $ex)
    {           return back()->withError("Error in Excel File");
  

    }
            return back()->withSuccessMessage('Succesful import data');
        
    }
}
