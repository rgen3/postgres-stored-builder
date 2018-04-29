<?php
declare(strict_types = 1);

namespace Test\QueryBuilder;

use PHPUnit\Framework\TestCase;
use Rgen3\QueryBuilder;

class BaseCommanTest extends TestCase
{
    /** @var QueryBuilder */
    private $builder;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->builder = new QueryBuilder();
    }

    public function selectSet_Positive()
    {
        $fields = [
            'fieldName as alias:int[]',
            'fieldName as alias:int',
        ];

        $this->builder->select($fields);
    }

    /**
     * @test
     */
    public function procedureArgument()
    {

        $this->builder
            ->select(['id', 'name', 'value'])
            ->from('my_procedure')
            ->fields([
                'int_val:integer' => 1,
                'int_array:int[]' => [1,2,3]
            ]);

        $expectedSql = "select id, name, value from my_procedure(int_val = 1::int, int_array = '{1, 2, 3}'::int[])";

        $this->assertEquals($expectedSql, $this->builder->getSql());
    }

    /**
     * @test
     */
    public function prodcedureNullableArgument()
    {
         $this->builder
            ->from('my_procedure')
            ->fields([
                'null_value:integer:nullable' => null
            ]);

         $expectedSql = "select * from my_procedure(null_value = null::int)";

         $this->assertEquals($expectedSql, $this->builder->getSql());
    }

    /**
     * @test
     */
    public function procedureNullableArray()
    {
        $this->builder
            ->from('my_procedure')
            ->fields([
                'array:int[]:nullable' => null
            ]);

        $expectedSql = "select * from my_procedure(array = null::int[])";

        $this->assertEquals($expectedSql, $this->builder->getSql());
    }
}