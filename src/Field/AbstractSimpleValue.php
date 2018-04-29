<?php
declare(strict_types = 1);

namespace Rgen3\Field;

use Rgen3\Exception\FieldNotNullable;

abstract class AbstractSimpleValue extends AbstractField
{
    /** @var null|string */
    protected $value;

    /** @var string */
    protected $name;

    /**
     * @param string $name
     * @param int|null $value
     * @param bool $nullable
     * @throws FieldNotNullable
     */
    public function __construct(string $name, ?int $value, bool $nullable = false)
    {
        if (!$nullable && is_null($value)) {
            throw new FieldNotNullable();
        }

        $this->name = $name;
        $this->value = $value;
        $this->nullable = $nullable;
    }

    /**
     * @return string
     */
    public function getFieldName(): string
    {
        return $this->name;
    }
}
