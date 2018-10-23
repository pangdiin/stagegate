<?php

namespace App\Model;

use App\Model\User;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;


class Category extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = "categories";

    protected $fillable = [
    	'code',
    	'name',
    	'description',
    ];

    public function usersCategory()
    {
    	return $this->belongsToMany(User::class, 'users_category','category_id','user_id');
    }

    public function actions()
    {
        $actions['show'] = ['type' => 'show',      'link' => route('admin.category.show', $this)];
        $actions['edit'] = ['type' => 'edit',      'link' => route('admin.category.edit', $this)];
        
        return $actions;
    }
}
