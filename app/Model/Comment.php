<?php

namespace App\Model;

use App\Model\Idea;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    protected $table = "comments";

    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function idea()
    {
    	return $this->belongsTo(Idea::class,'idea_id');
    }

    public function commentable()
	{
	    return $this->morphTo();
	}
}
