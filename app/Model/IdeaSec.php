<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class IdeaSec extends Model
{
    protected $table = "idea_secs";

    protected $guarded = [];

    public function buildup()
    {
    	return $this->belongsTo(Buildup::class, 'sec_id', 'id');
    }
}
