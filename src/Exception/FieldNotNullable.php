<?php
declare(strict_types = 1);

namespace Rgen3\Exception;

class FieldNotNullable extends Base
{
    protected $errorMessage = 'Field value can not be null';
    protected $errorCode = self::ERROR_CODE_FIELD_IS_NOT_NULLABLE;
}