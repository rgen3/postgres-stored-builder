<?php
declare(strict_types = 1);

namespace Rgen3\Exception;

class InvalidFieldValue extends Base
{
    protected $errorMessage = 'Invalid field value';
    protected $errorCode = self::ERROR_CODE_INVALID_FIELD_VALUE;
}