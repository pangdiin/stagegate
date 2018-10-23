<?php

namespace App\Http\Controllers\Admin\Buildup;

use App\Http\Controllers\Controller;
use App\Model\Buildup;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BuildupsTableController extends Controller
{
    public function __invoke()
    {
    	$buildups = Buildup::select(['id','name','type', 'code', 'description'])->get();

    	return DataTables::of($buildups)
    			->addColumn('actions', function ($buildup) {
                	return $buildup->actions();
            	})->rawColumns(['actions'])->make(true);
    }
}
