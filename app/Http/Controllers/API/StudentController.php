<?php

namespace App\Http\Controllers\API;
use Auth;
use App\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;

class StudentController extends  BaseController
{
    public function index(Request $request)
    {
        $length = $request->input('length');
        $column = $request->input('column'); //Index
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');
      //  $student = Student::where('organization_id', 1);
        //$c = new collect(Student());

      //  $ne = new DataTableCollectionResource(Student::where('organization_id', 1)->get()); 
      //$query = Student::all();
        $query = Student::where('organization_id', 1)->dataTableQuery($column, $orderBy, $searchValue);
        $data = $query->paginate($length);
        //$students = Student::all();

        return new DataTableCollectionResource($data);

  //    return $this->sendResponse($students->toArray(), 'Students retrieved successfully.');
    }
}
