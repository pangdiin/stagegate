<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buildup extends Model
{
    protected $table = 'buildups';

    protected $fillable = [
    	'name',
    	'type',
    	'code',
    	'description',
    ];

    public function actions()
    {
        $actions['show'] = ['type' => 'show',      'link' => route('admin.buildup.show', $this)];
        $actions['edit'] = ['type' => 'edit',      'link' => route('admin.buildup.edit', $this)];
        
        return $actions;
    }

    public function scopeofType($query, $type)
    {
        return $query->where('type', $type)
                ->select(['id', 'name', 'code', 'description']);
    }

    public function getCodeAndDescriptionAttribute()
    {
        return $this->code . ' - ' . $this->description;
    }
}
