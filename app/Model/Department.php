<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Department extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'departments';

    protected $fillable = [
    	'code',
    	'name',
    	'description',
    ];

    public function actions()
    {
        $actions['show'] = ['type' => 'show',      'link' => route('admin.department.show', $this)];
        $actions['edit'] = ['type' => 'edit',      'link' => route('admin.department.edit', $this)];
        
        return $actions;
    }
}
