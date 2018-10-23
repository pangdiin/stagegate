<?php

namespace App\Http\Controllers\Admin\Company;

use App\Http\Controllers\Controller;
use App\Model\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CompaniesTableController extends Controller
{
    public function __invoke()
    {
    	$company = Company::select(['id','code','name','description'])->get();

    	return DataTables::of($company)
    			->addColumn('actions', function ($company) {
                	return $company->actions();
            	})->rawColumns(['actions'])->make(true);
    }
}
