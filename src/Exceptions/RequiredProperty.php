<?php

namespace XModule\Exceptions;

class RequiredProperty extends \Exception {
    public function __construct($property, $className, $code = 0, Exception $previous = null)
    {
        $message = "$property is a required property in $className";
        parent::__construct($message, $code, $previous);
    }
}