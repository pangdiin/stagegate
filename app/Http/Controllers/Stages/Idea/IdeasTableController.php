<?php

namespace App\Http\Controllers\Stages\Idea;

use App\Http\Controllers\Controller;
use App\Model\Idea;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class IdeasTableController extends Controller
{
    public function __invoke()
    {
    	$ideas = Idea::select([
    		'id',
    		'company_id',
    		'category_id',
    		'product_concept',
    		'product_description',
    		'opportunities',
    		'competition',
    		'retail_price',
    		])->with(['company', 'category', 'ideaOwners'])->get();

    	return DataTables::of($ideas)
                ->addColumn('owner', function($idea) {
                    return $idea->currentOwner();
                })
    			->addColumn('company', function($idea) {
    				return optional($idea->company)->name;
    			})
    			->addColumn('category', function($idea) {
    				return optional($idea->category)->name;
    			})
                ->editColumn('product_concept', function($idea) {
                    return desc_limit($idea->product_concept,7);
                })
                ->editColumn('product_description', function($idea) {
                    return desc_limit($idea->product_description,7);
                })
                ->editColumn('opportunities', function($idea) {
                    return desc_limit($idea->opportunities,7);
                })
                ->editColumn('competition', function($idea) {
                    return desc_limit($idea->competition,7);
                })
    			->addColumn('actions', function ($idea) {
                	return $idea->actions();
            	})->rawColumns(['actions'])->make(true);
    }
}
