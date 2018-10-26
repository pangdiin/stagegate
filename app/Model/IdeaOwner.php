<?php

namespace App\Model;

use App\Model\Idea;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class IdeaOwner extends Model
{
    protected $table = "idea_owners";

    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id')->select(['id', 'first_name', 'last_name']);
    }

    public function idea()
    {
    	return $this->belongsTo(Idea::class, 'idea_id');
    }
}
