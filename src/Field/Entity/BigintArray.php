<?php
declare(strict_types = 1);

namespace Rgen3\Field\Entity;

use Rgen3\Field\AbstractSimpleArrayValue;

class BigintArray extends AbstractSimpleArrayValue
{
    /**
     * @return string
     */
    public function getFieldType(): string
    {
        return 'bigint[]';
    }

    /**
     * @return array|null
     */
    protected function getPreparedValue(): ?array
    {
        return $this->value;
    }
}