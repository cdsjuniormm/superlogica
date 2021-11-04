<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsCorrectFormatZipCode extends Constraint
{
    public $message = 'The string appears to be in an invalid format.';
    public $mode = 'strict'; // If the constraint has configuration options, define them as public properties
}