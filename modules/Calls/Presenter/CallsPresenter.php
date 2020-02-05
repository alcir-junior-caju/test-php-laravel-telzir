<?php

namespace Modules\Calls\Presenter;

use Laracasts\Presenter\Presenter;

class CallsPresenter extends Presenter
{
    public function getCall($value)
    {
        if ($value === 'origin') {
            return str_pad($this->origin, 3, "0", STR_PAD_LEFT );
        } else {
            return str_pad($this->destination, 3, '0', STR_PAD_LEFT);
        }
    }

    public function getValue()
    {
        return number_format($this->value, 2, ',', '.');
    }
}
