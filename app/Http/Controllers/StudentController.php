<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;
use JamesDordoy\LaravelVueDatatable\Http\Resources\DataTableCollectionResource;
class StudentController extends Controller
{
    public function index(Request $request)
    {
        $length = $request->input('length');
        $column = $request->input('column'); 
        $orderBy = $request->input('dir', 'asc');
        $searchValue = $request->input('search');

        $query = Student::org()->dataTableQuery($column, $orderBy, $searchValue);
        $data = $query->paginate($length);
        return new DataTableCollectionResource($data);

  }
}
