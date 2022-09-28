<?php

namespace Microweber\Encontrar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MItem extends Model
{
    protected $table = 'enc_items';
    use HasFactory;

    public function country()
    {
        return $this->belongsTo('Microweber\Encontrar\Models\MCountry', 'country_id');
    }

    public function details()
    {
        return $this->hasMany("Microweber\Encontrar\Models\MItemsDetail");
    }
}