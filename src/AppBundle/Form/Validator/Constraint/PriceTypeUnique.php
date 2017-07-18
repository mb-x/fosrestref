<?php

namespace AppBundle\Form\Validator\Constraint;

use AppBundle\Form\Validator\PriceTypeUniqueValidator;
use Symfony\Component\Validator\Constraint;


/**
 * @Annotation
 */
class PriceTypeUnique extends Constraint
{
    public $message = 'A place cannot contain prices with same type';

    public function validatedBy()
    {
        return PriceTypeUniqueValidator::class;
    }
}