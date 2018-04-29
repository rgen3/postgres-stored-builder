<?php
declare(strict_types = 1);

namespace Rgen3\Field\Entity;

use Rgen3\Field\AbstractSimpleValue;

class Decimal extends AbstractSimpleValue
{
    /**
     * @return string
     */
    public function getFieldType(): string
    {
        return 'decimal';
    }

    /**
     * @return float|null
     */
    public function getFieldValue(): ?float
    {
        return $this->value;
    }
}
