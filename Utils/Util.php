<?php
namespace reka\Utils;

class Util
{
    public static function cleanArgs($args)
    {
        while (is_array($args) && count($args) == 1 && is_array($args[0])) {
            $args = $args[0];
        }

        return $args;
    }
}
