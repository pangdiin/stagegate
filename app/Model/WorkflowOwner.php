<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkflowOwner extends Model
{
    protected $table = "workflow_current_role_owners";

    protected $fillable = [
    	'workflow_id',
    	'user_role',
    ];
}
