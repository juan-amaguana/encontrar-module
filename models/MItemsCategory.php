<?php

namespace Microweber\Encontrar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MItemsCategory extends Model
{
    protected $table = 'ecn_items_categories';
    use HasFactory;

    public function item()
    {
        return $this->belongsTo('Microweber\Encontrar\Models\MItem', 'item_id');
    }

    public function category()
    {
        return $this->belongsTo(MCategory::class, 'category_id');
    }
}