<?php

namespace Tune\Contracts\Validation;

use Tune\Validation\Validator;

interface ValidatorAwareRule
{
    /**
     * Set the current validator.
     *
     * @param  \Tune\Validation\Validator  $validator
     * @return $this
     */
    public function setValidator(Validator $validator);
}
