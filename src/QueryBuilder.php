<?php
declare(strict_types = 1);

namespace Rgen3;

use Rgen3\Field\Factory;
use Rgen3\Field\FieldInterface;

class QueryBuilder
{
    /** @var string */
    private $selectFields = '*';

    /** @var string */
    private $fromProcedure;

    /** @var string */
    private $procedureFields;

    /**
     * @return string
     */
    public function __toString(): string
    {
        $this->getSql();
    }

    /**
     * @param array $fields
     * @return QueryBuilder
     */
    public function select(array $fields): self
    {
        $fields = array_map(
            function($field)
            {
                $field = explode(':', $field);
                if(count($field) == 1) {
                    $field[0] = StringHelper::toCamel($field[0]);
                }

                return implode(' as ', $field);
            },
            $fields
        );

        $this->selectFields = implode(', ', $fields);

        return $this;
    }

    /**
     * @param string $fromProcedure
     * @return QueryBuilder
     */
    public function from(string $fromProcedure): self
    {
        $this->fromProcedure = $fromProcedure;
        return $this;
    }

    /**
     * @param array $fields
     * @return QueryBuilder
     * @throws Exception\InvalidFieldType
     */
    public function fields(array $fields): self
    {
        $fieldInstances = [];
        foreach ($fields as $params => $value) {
            $fieldInstances[] = $this->getFieldInstance($params, $value);
        }

        $this->procedureFields = implode(', ', $fieldInstances);
        return $this;
    }

    /**
     * @return string
     */
    public function getSql(): string
    {
        return sprintf(
            'select %s from %s(%s)',
            $this->selectFields ?? '*',
            $this->fromProcedure,
            $this->procedureFields
        );
    }

    /**
     * @param string $params
     * @param $value
     * @return FieldInterface
     * @throws Exception\InvalidFieldType
     */
    private function getFieldInstance(string $params, $value): FieldInterface
    {
        $params = explode(':', $params);
        $fieldName = $params[0];
        $fieldType = $params[1];
        $nullable = (bool) ($params[2] ?? false);
        return Factory::getInstance(
            $fieldName,
            $fieldType,
            $nullable,
            $value
        );
    }
}