<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class ContainsCorrectLength extends Constraint
{
    public $message = 'The string must contain from "{{ min }}" to "{{ max }}" characters.';
    public $mode = 'strict'; // If the constraint has configuration options, define them as public properties
    public $min = 1;
    public $max = 255;
}