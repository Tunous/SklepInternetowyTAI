<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    public function contactDetails()
    {
        return $this->belongsTo('App\ContactDetails');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product')
            ->withTimestamps();
    }
}
