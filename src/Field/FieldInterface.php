<?php
declare(strict_types = 1);

namespace Rgen3\Field;

interface FieldInterface
{
    /**
     * @return string
     */
    public function getFieldName(): string;

    /**
     * @return mixed
     */
    public function getFieldValue();

    /**
     * @return string
     */
    public function getFieldType(): string;

    /**
     * @return bool
     */
    public function isNullable(): bool;

    /**
     * @return string
     */
    public function toString(): string;

    /**
     * @return string
     */
    public function __toString(): string;
}
