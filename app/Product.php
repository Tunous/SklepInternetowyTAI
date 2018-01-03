<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property string name
 * @property string description
 * @property int cost
 * @property int quantity
 */
class Product extends Model
{
    protected $fillable = [
        "name", "description", "cost"
    ];

    public function purchases()
    {
        return $this->belongsToMany('App\Purchase')
            ->withTimestamps();
    }
}
