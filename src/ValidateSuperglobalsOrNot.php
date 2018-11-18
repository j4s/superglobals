<?php
/** j4s\superglobals */

declare(strict_types=1);

namespace j4s\superglobals;

if (class_exists('j4s\validation\Validator')) {
    abstract class ValidateSuperglobalsOrNot extends \j4s\validation\Validator
    {

    }
} else {
    abstract class ValidateSuperglobalsOrNot
    {

    }
}

