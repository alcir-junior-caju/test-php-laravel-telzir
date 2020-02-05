<?php

namespace Modules\Calls\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Calls\Presenter\CallsPresenter;
use Laracasts\Presenter\PresentableTrait;

class Call extends Model
{
    use PresentableTrait;

    protected $presenter = CallsPresenter::class;
    protected $fillable = [
        'origin',
        'destination',
        'value'
    ];

    public function setValueAttribute($value)
    {
        return $this->attributes['value'] = str_replace(',', '.', $value);
    }

}
