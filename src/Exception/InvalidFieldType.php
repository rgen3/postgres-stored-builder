<?php
declare(strict_types = 1);

namespace Rgen3\Exception;

class InvalidFieldType extends Base
{
    protected $errorMessage = 'Invalid field type';
    protected $errorCode = self::ERROR_CODE_INVALID_FIELD_TYPE;
}