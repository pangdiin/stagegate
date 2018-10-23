<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Company extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = "companies";

    protected $fillable = [
    	'code',
    	'name',
    	'description'
    ];

    public function actions()
    {
        $actions['show'] = ['type' => 'show',      'link' => route('admin.company.show', $this)];
        $actions['edit'] = ['type' => 'edit',      'link' => route('admin.company.edit', $this)];
        
        return $actions;
    }

}
