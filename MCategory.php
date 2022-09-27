<?php

namespace Microweber\Encontrar;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCategory extends Model
{
    protected $table = 'enc_categories';
    use HasFactory;

    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent');
    }
}
