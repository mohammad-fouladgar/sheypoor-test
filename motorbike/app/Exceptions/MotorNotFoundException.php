<?php

namespace App\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MotorNotFoundException extends NotFoundHttpException
{
    /**
     * MotorNotFoundException constructor.
     */
    public function __construct()
    {
        parent::__construct('Motor not found.');
    }
}
