<?php
declare(strict_types = 1);

namespace Rgen3\Field;

use Rgen3\Exception\InvalidFieldType;
use Rgen3\Field\Entity\Integer;
use Rgen3\Field\Entity\IntegerArray;
use Rgen3\Field\Entity\Text;
use Rgen3\Field\Entity\Varchar;
use Rgen3\StringHelper;

class Factory
{
    public const INTEGER = Integer::class;
    public const INTEGER_ARRAY = IntegerArray::class;
    public const TEXT = Text::class;
    public const TEXT_ARRAY = TextArray::class;
    public const VARCHAR = Varchar::class;

    /**
     * @param $field
     * @return string
     * @throws InvalidFieldType
     */
    private static function fieldMapper($field): string
    {
        /** @var string $fieldName */
        $fieldName = [
                'int' => self::INTEGER,
                'integer' => self::INTEGER,
                'int[]' => self::INTEGER_ARRAY,
                'integer[]' => self::INTEGER_ARRAY,
                'text' => self::TEXT,
            ][$field] ?? null;

        if (strpos($field, 'varchar') === 0) {
            $fieldName = self::VARCHAR;
        }

        if (is_null($fieldName)) {
            throw new InvalidFieldType();
        }

        return $fieldName;
    }

    /**
     * @param string $fieldName
     * @param string $fieldType
     * @param bool $nullable
     * @param $fieldValue
     * @return FieldInterface
     * @throws InvalidFieldType
     */
    public static function getInstance(
        string $fieldName,
        string $fieldType,
        bool $nullable,
        $fieldValue
    ): FieldInterface
    {
        $class = self::fieldMapper($fieldType);

        return new $class($fieldName, $fieldValue, $nullable);
    }
}
