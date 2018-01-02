<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'email', 'name', 'surname', 'street', 'postcode', 'city', 'phone'
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
