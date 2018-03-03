<?php

namespace App\Exceptions;

class InvalidUploadedFileException extends \Exception
{
    /**
     * InvalidUploadedFileException constructor.
     */
    public function __construct()
    {
        parent::__construct('The file must be of type UploadedFile.');
    }
}
