<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Model\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CategoriesTableController extends Controller
{
    public function __invoke()
    {
    	$category = Category::select(['id','code','name','description'])->get();

    	return DataTables::of($category)
    			->addColumn('actions', function ($category) {
                	return $category->actions();
            	})->rawColumns(['actions'])->make(true);
    }
}
