<?php
/** j4s\superglobals */

declare(strict_types=1);

namespace j4s\superglobals;

if (class_exists('j4s\base\Validator')) {
    class ValidateSuperglobalsOrNot extends \j4s\base\Validator
    {

    }
} else {
    class ValidateSuperglobalsOrNot
    {

    }
}

