<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property string name
 * @property string alias
 * @property string short_description
 * @property string description
 * @property int cost
 * @property int quantity
 */
class Product extends Model
{
    protected $fillable = [
        "name", "alias", "short_description", "description", "cost"
    ];

    public function purchases()
    {
        return $this->belongsToMany('App\Purchase')
            ->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
