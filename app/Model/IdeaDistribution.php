<?php

namespace App\Model;

use App\Model\Buildup;
use Illuminate\Database\Eloquent\Model;

class IdeaDistribution extends Model
{
    protected $table = "idea_distributions";

    protected $guarded = [];

    public function buildup()
    {
    	return $this->belongsTo(Buildup::class, 'distribution_id', 'id');
    }
}
