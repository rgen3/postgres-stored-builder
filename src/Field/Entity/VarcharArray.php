<?php
declare(strict_types = 1);

namespace Rgen3\Field\Entity;

use Rgen3\Field\AbstractSimpleArrayValue;

class VarcharArray extends AbstractSimpleArrayValue
{
    /**
     * @return string
     */
    public function getFieldType(): string
    {
        return 'varchar[]';
    }

    /**
     * @return array|null
     */
    protected function getPreparedValue(): ?array
    {
        return array_map(
            function($item) {
                return "'" . str_replace("'", "''", $item) . "'";
            },
            $this->value);
    }
}