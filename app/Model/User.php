<?php

namespace App\Model;

use App\Model\Category;
use App\Model\Company;
use App\Model\Department;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'department_id',
        'company_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'users_category','user_id','category_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function actions()
    {
        $actions['show'] = ['type' => 'show',      'link' => route('admin.users.show', $this)];
        $actions['edit'] = ['type' => 'edit',      'link' => route('admin.users.edit', $this)];
        
        return $actions;
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
