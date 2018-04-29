<?php
declare(strict_types = 1);

namespace Rgen3\Field;

abstract class AbstractField implements FieldInterface
{
    /** @var bool */
    protected $nullable;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toString();
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return sprintf(
            '%s = %s%s',
            $this->getFieldName(),
            $this->getValue(),
            $this->getType()
        );
    }

    /**
     * @return bool
     */
    public function isNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * @return string
     */
    private function getValue(): string
    {
        if ($this->isNullable() && is_null($this->getFieldValue()))
        {
            return 'null';
        }

        return (string) $this->getFieldValue();
    }

    /**
     * @return string
     */
    private function getType()
    {
        $result = '';

        if ($this->getFieldType()) {
            $result = sprintf('::%s', $this->getFieldType());
        }

        return $result;
    }
}