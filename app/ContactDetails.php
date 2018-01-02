<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDetails extends Model
{
    protected $fillable = [
        'email', 'name', 'surname', 'street', 'postcode', 'city', 'phone'
    ];

    public function user()
    {
        return $this->belongsTo('App\User')->withDefault([
                'username' => 'guest',
                'email' => $this->email
            ]
        );
    }

    public function purchases()
    {
        return $this->hasMany('App\Purchase');
    }
}
