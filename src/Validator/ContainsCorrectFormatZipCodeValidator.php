<?php
namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class ContainsCorrectFormatZipCodeValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof ContainsCorrectFormatZipCode) {
            throw new UnexpectedTypeException($constraint, ContainsCorrectFormatZipCode::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value)) {
            // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
            throw new UnexpectedValueException($value, 'string');

            // separate multiple types using pipes
            // throw new UnexpectedValueException($value, 'string|int');
        }
        
        // access your configuration options like this:
        if ('strict' === $constraint->mode) {
            // ...
        }
        
        if (!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $value)) {
            // the argument must be a string or an object implementing __toString()
            $this->context->buildViolation($constraint->message)
                ->addViolation();
        }
    }
}