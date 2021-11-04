<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsAlphanumeric extends Constraint
{
    public $message = 'The string must contain at least one letter and one number.';
    public $mode = 'strict'; // If the constraint has configuration options, define them as public properties
}