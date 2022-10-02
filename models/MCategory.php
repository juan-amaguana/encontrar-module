<?php

namespace Microweber\Encontrar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCategory extends Model
{
    protected $table = 'enc_categories';
    use HasFactory;

    public function children()
    {
        return $this->hasMany('Microweber\Encontrar\Models\MCategory', 'parent');
    }

    public function parent()
    {
        return $this->belongsTo('Microweber\Encontrar\Models\MCategory', 'parent');
    }
}