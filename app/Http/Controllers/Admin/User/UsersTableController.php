<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UsersTableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $users = User::select(['id','first_name','last_name', 'company_id', 'department_id'])
                ->with(['company' => function($q) {
                    $q->select('id','name');
                },
                'department' => function($q) {
                    $q->select('id','name');
                }])->get();

        return DataTables::of($users)
                ->addColumn('company', function($user) {
                    return optional($user->company)->name;
                })
                ->addColumn('department', function($user) {
                    return optional($user->department)->name;
                })
                ->addColumn('actions', function ($user) {
                    return $user->actions();
                })->rawColumns(['actions'])->make(true);
    }

}
