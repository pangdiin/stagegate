<?php

namespace App\Model;

use App\Model\Buildup;
use App\Model\WorkflowNextOwner;
use App\Model\WorkflowOwner;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    protected $table = "workflow";

    protected $fillable = [
    	'sort_order',
    	'stage_id',
    	'substage_id',
    	'action_id',
    	'nextstage_id',
    	'nextsubstage_id',
    	'nextaction_id',
    	'active',
    ];

    public function currentRoleOwner()
    {
        return $this->hasMany(WorkflowOwner::class, 'workflow_id', 'id');
    }

    public function nextRoleOwner()
    {
        return $this->hasMany(WorkflowNextOwner::class, 'workflow_id', 'id');
    }

    public function stage()
    {
        return $this->belongsTo(Buildup::class, 'stage_id', 'id');
    }

    public function substage()
    {
        return $this->belongsTo(Buildup::class, 'substage_id', 'id');
    }

    public function action()
    {
        return $this->belongsTo(Buildup::class, 'action_id', 'id');
    }

    public function nextStage()
    {
        return $this->belongsTo(Buildup::class, 'nextstage_id', 'id');
    }

    public function nextSubStage()
    {
        return $this->belongsTo(Buildup::class, 'nextsubstage_id', 'id');
    }

    public function nextAction()
    {
        return $this->belongsTo(Buildup::class, 'nextaction_id', 'id');
    }

    public function actions()
    {
        $actions['show'] = ['type' => 'show',      'link' => route('admin.workflow.show', $this)];
        $actions['edit'] = ['type' => 'edit',      'link' => route('admin.workflow.edit', $this)];
        
        return $actions;
    }
}
