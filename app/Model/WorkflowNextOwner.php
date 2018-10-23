<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkflowNextOwner extends Model
{
    protected $table = "workflow_next_role_owners";

    protected $fillable = [
    	'workflow_id',
    	'user_role',
    ];
}
