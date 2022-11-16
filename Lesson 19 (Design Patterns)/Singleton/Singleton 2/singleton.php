<?php

class Singleton
{
    private static $instance = [];

    private final function __construct()
    {
    }

    public static function getInstance()
    {
        $class = get_called_class();
        if (!isset(self::$instance[$class])) {
            self::$instance[$class] = new static();
        }
        return self::$instance[$class];
    }
}
