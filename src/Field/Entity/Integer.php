<?php
declare(strict_types = 1);

namespace Rgen3\Field\Entity;

use Rgen3\Field\AbstractSimpleValue;

class Integer extends AbstractSimpleValue
{
    /**
     * @return string
     */
    public function getFieldType(): string
    {
        return 'int';
    }

    /**
     * @return int|null
     */
    public function getFieldValue(): ?int
    {
        return $this->value;
    }
}
