<?php

namespace App\Http\Controllers\Admin\Workflow;

use App\Http\Controllers\Controller;
use App\Model\Workflow;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class WorkflowTableController extends Controller
{
    public function __invoke()
    {
    	$workflow = Workflow::select(
    			['id',
    			'sort_order',
    			'stage_id',
    			'substage_id',
    			'action_id',
    			'nextstage_id',
    			'nextsubstage_id',
    			'nextaction_id',
    			'active',
    			])->with(['stage','substage', 'action', 'nextStage', 'nextSubStage', 'nextAction'])->get();

    	return DataTables::of($workflow)
                ->editColumn('stage_id', function($workflow) {
                    return optional($workflow->stage)->codeAndDescription;
                })
                ->editColumn('substage_id', function($workflow) {
                    return optional($workflow->substage)->codeAndDescription;
                })
                ->editColumn('action_id', function($workflow) {
                    return optional($workflow->action)->codeAndDescription;
                })
                ->editColumn('nextstage_id', function($workflow) {
                    return optional($workflow->nextStage)->codeAndDescription;
                })
                ->editColumn('nextsubstage_id', function($workflow) {
                    return optional($workflow->nextSubStage)->codeAndDescription;
                })
                ->editColumn('nextaction_id', function($workflow) {
                    return optional($workflow->nextAction)->codeAndDescription;
                })
                ->editColumn('active', function($workflow) {
                    return $workflow->active == true ? 'Active' : 'Inactive';
                })
    			->addColumn('actions', function ($workflow) {
                	return $workflow->actions();
            	})->rawColumns(['actions'])->make(true);
    }
}
