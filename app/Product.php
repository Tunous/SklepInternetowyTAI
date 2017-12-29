<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int id
 */
class Product extends Model
{
    protected $fillable = [
        "name", "description", "cost"
    ];
}
