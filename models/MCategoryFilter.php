<?php

namespace Microweber\Encontrar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCategoryFilter extends Model
{
    protected $table = 'ecn_category_filters';
    use HasFactory;

    public function parent()
    {
        return $this->belongsTo($this, 'parent');
    }

    public function children()
    {
        return $this->hasMany($this, 'parent');
    }

    // recursive, loads all descendants
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }


}