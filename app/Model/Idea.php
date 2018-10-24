<?php

namespace App\Model;

use App\Model\Buildup;
use App\Model\Category;
use App\Model\Comment;
use App\Model\Company;
use App\Model\IdeaOwner;
use App\Model\IdeaSource;
use App\Model\Workflow;
use App\Model\WorkflowHistory;
use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    protected $table = "ideas";

    protected $fillable = [
    	'user_id',
    	'workflow_id',
    	'company_id',
    	'category_id',
    	'demographic_id',
    	'sec_id',
    	'existing',
    	'product_concept',
    	'product_description',
    	'psychographics',
    	'distribution',
    	'opportunities',
    	'retail_price',
    	'competition',
    	'target_launch',
    	'is_kiled',
    	'is_initial'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function company()
    {
    	return $this->belongsTo(Company::class, 'company_id');
    }

    public function category()
    {
    	return $this->belongsTo(Category::class, 'category_id');
    }

    public function demographic()
    {
    	return $this->belongsTo(Buildup::class, 'demographic_id', 'id');
    }

    public function sec()
    {
    	return $this->belongsTo(Buildup::class, 'sec_id', 'id');
    }

    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function ideaSources()
    {
    	return $this->hasMany(IdeaSource::class,'idea_id');
    }

    public function ideaOwners()
    {
        return $this->hasMany(IdeaOwner::class,'idea_id');
    }

    public function workflow()
    {
    	return $this->belongsTo(Workflow::class, 'workflow_id');
    }

    public function workflowHistory()
    {
        return $this->hasMany(WorkflowHistory::class, 'idea_id');
    }
}
