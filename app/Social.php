<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'social_provider';

    protected $fillable = [
        'email', 'provider_id','provider'
    ];

}
