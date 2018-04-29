<?php
declare(strict_types = 1);

namespace Rgen3\Field\Entity;

use Rgen3\Exception\FieldNotNullable;
use Rgen3\Field\AbstractSimpleValue;

class Text extends AbstractSimpleValue
{
    /**
     * @return string
     */
    public function getFieldType(): string
    {
        return 'text';
    }

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->name;
    }

    /**
     * @return null|string
     */
    public function getFieldValue(): ?string
    {
        return addslashes($this->value);
    }
}