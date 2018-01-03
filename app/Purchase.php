<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int user_id
 * @property int total_cost
 * @property string token
 */
class Purchase extends Model
{
    protected $fillable = [
        'email', 'name', 'surname', 'street', 'postcode', 'city', 'phone', 'total_cost', 'token'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
