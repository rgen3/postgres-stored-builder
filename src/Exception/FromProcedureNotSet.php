<?php
declare(strict_types = 1);

namespace Rgen3\Exception;

class FromProcedureNotSet extends Base
{
    protected $errorMessage = 'Procedure to select from is not set';
    protected $errorCode = self::ERROR_CODE_FROM_PROCEDURE_IS_NOT_SET;
}