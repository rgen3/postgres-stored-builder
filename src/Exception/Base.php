<?php
declare(strict_types = 1);

namespace Rgen3\Exception;

abstract class Base extends \Exception
{
    const ERROR_CODE_FIELD_IS_NOT_NULLABLE = 11000;
    const ERROR_CODE_FROM_PROCEDURE_IS_NOT_SET = 11001;
    const ERROR_CODE_INVALID_FIELD_TYPE = 11002;
    const ERROR_CODE_INVALID_FIELD_VALUE = 11003;

    protected $errorMessage;
    protected $errorCode;

    public function __construct()
    {
        parent::__construct($this->errorMessage, $this->errorCode);
    }

    public function setErrorMessage(string $message)
    {
        $this->errorMessage = $message;
        return $this;
    }
}