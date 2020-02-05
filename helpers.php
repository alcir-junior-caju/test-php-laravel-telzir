<?php

const BOOTSTRAP_SUCCESS = 0;
const BOOTSTRAP_INFO = 1;
const BOOTSTRAP_WARNING = 2;
const BOOTSTRAP_ERROR = 3;

function bootstrapMessage($type = null) {
    $class = [
        BOOTSTRAP_SUCCESS => 'success',
        BOOTSTRAP_INFO => 'info',
        BOOTSTRAP_WARNING => 'warning',
        BOOTSTRAP_ERROR => 'danger',
    ];

    return $class[$type] ?? $class['BOOTSTRAP_INFO'];
}
