<?php

namespace Modules\Plans\Models;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'name',
        'minutes',
        'percent'
    ];
}
