<?php

namespace Microweber\Encontrar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MItem extends Model
{
    protected $table = 'enc_items';
    protected  $primaryKey = 'id';
    use HasFactory;

    public function country()
    {
        return $this->belongsTo('Microweber\Encontrar\Models\MCountry', 'country_id');
    }

    public function details()
    {
        return $this->hasMany("Microweber\Encontrar\Models\MItemsDetail", "item_id");
    }

    public function categories()
    {
        return $this->hasMany(MItemsCategory::class, "item_id");
    }
}