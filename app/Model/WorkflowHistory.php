<?php

namespace App\Model;

use App\Model\Idea;
use App\Model\Workflow;
use Illuminate\Database\Eloquent\Model;

class WorkflowHistory extends Model
{
    protected $table = "workflow_histories";

    protected $guarded = [];

    public function idea()
    {
    	return $this->belongsTo(Idea::class, 'idea_id');
    }

    public function workflow()
    {
    	return $this->belongsTo(Workflow::class, 'workflow_id');
    }

    public function workflowHistoryOwner()
    {
    	return $this->hasMany(WorkflowHistoryOwner::class, 'workflow_history_id');
    }
}
