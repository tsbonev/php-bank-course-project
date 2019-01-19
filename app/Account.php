<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'amount'
    ];

    public $timestamps = false;
}
