<?php
declare(strict_types = 1);

namespace Test\Helper;

use Rgen3\StringHelper;

class StringHelperTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function snakeToCamel_Positive()
    {
        $this->assertEquals(
            'some_amd_value',
            StringHelper::toSnake('someAMDValue')
        );
    }

    /**
     * @test
     */
    public function camelToSnake_Positive()
    {
        $this->assertEquals(
            'someValue',
            StringHelper::toCamel('some_value')
        );
    }
}