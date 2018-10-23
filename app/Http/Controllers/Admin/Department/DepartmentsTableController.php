<?php

namespace App\Http\Controllers\Admin\Department;

use App\Http\Controllers\Controller;
use App\Model\Department;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DepartmentsTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $department = Department::select(['id','code','name','description'])->get();

        return DataTables::of($department)
                ->addColumn('actions', function ($department) {
                    return $department->actions();
                })->rawColumns(['actions'])->make(true);
    }

}
