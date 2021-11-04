<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsSpace extends Constraint
{
    public $message = 'The string contains an illegal character: it cannot contain spaces.';
    public $mode = 'strict'; // If the constraint has configuration options, define them as public properties
}