<?php

namespace App\Http\Controllers\Admin\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RolesTableController extends Controller
{

    public function __invoke()
	{
		$roles = Role::select(['id','name'])->get();

    	return DataTables::of($roles)
            ->addColumn('actions', function ($role) {
                return $this->actions($role);
            })->rawColumns(['actions'])->make(true);

	}

	protected function actions($role)
	{
        $actions['show'] = ['type' => 'show',      'link' => route('admin.roles.show', $role->id)];
        $actions['edit'] = ['type' => 'edit',      'link' => route('admin.roles.edit', $role->id)];
        
        return $actions;
	}
}
