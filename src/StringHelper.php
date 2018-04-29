<?php
declare(strict_types = 1);

namespace Rgen3;

class StringHelper
{
    /**
     * @param string $string
     * @return string
     */
    public static function toSnake(string $string): string
    {
        return preg_replace_callback(
            '/(?P<a>[A-Z]+)(?P<b>[A-Z])|(?<![A-Z])(?P<b>[A-Z])/J',
            function($m) { return strtolower("_" . (empty($m['a']) ? '' : $m['a'] . '_') . $m['b']); },
            $string
        );
    }

    /**
     * @param string $string
     * @return string
     */
    public static function toCamel(string $string): string
    {
        $camelizedArray = array_map(
            function($part) {
                return ucfirst($part);
            },
            explode('_', $string)
        );
        return lcfirst(implode("", $camelizedArray));
    }
}