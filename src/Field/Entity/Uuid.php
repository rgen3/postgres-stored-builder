<?php
declare(strict_types = 1);

namespace Rgen3\Field\Entity;

use Rgen3\Field\AbstractSimpleValue;

class Uuid extends AbstractSimpleValue
{
    /**
     * @return string
     */
    public function getFieldType(): string
    {
        return 'uuid';
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
        return "'" . str_replace("'", "''", $this->value) . "'";
    }
}