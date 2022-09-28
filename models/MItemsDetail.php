<?php

namespace Microweber\Encontrar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MItemsDetail extends Model
{
    protected $table = 'enc_items_detail';
    use HasFactory;

    protected $casts = [
        'items' => 'array'
    ];

    public function item()
    {
        return $this->belongsTo('Microweber\Encontrar\Models\MItem', 'item_id');
    }
}