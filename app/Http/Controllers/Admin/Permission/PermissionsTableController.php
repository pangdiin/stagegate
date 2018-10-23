<?php

namespace App\Http\Controllers\Admin\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class PermissionsTableController extends Controller
{
	public function __invoke()
	{
		$permissions = Permission::select(['id','name'])->get();

    	return DataTables::of($permissions)
            ->addColumn('actions', function ($permission) {
                return $this->actions($permission);
            })->rawColumns(['actions'])->make(true);

	}

	protected function actions($permission)
	{
        $actions['show'] = ['type' => 'show',      'link' => route('admin.permissions.show', $permission->id)];
        $actions['edit'] = ['type' => 'edit',      'link' => route('admin.permissions.edit', $permission->id)];
        
        return $actions;
	}
    
}
