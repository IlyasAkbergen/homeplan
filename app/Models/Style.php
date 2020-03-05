<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = ['parent_id', 'name', 'description'];
    protected $with = ['children'];

    public function children()
    {
        return $this->hasMany(Style::class, 'parent_id')->where('deleted', 0);
    }

    public function parent()
    {
        return $this->belongsTo(Style::class, 'parent_id');
    }

    public function path()
    {
        return isset($this->parent) ? $this->parent->path() . '/' . $this->id : (string)$this->id;
    }
    public function allChildren()
    {
        return $this->getChildrenIds($this, [$this->id]);
    }

    private function getChildrenIds($parent, $ids = [])
    {
        if(count($parent->children) > 0){
            $ids = array_merge($ids, $parent->children->pluck('id')->toArray());
            $parent->children->map(function ($child) use (&$ids) {
                $ids = $this->getChildrenIds($child, $ids);
            });
        }
    }
}
