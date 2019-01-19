<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    protected $fillable = [
        'id',
        'account_id',
        'type',
        'amounts',
        'timestamps'
    ];
}
