<?php

namespace App\Model;

use App\Model\Buildup;
use App\Model\Category;
use App\Model\Company;
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
    	
    }

    public function ideaOwners()
    {

    }

    public function workflow()
    {
    	
    }
}
