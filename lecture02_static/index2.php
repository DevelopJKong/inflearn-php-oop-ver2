<?php

/**
 * Static Binding
 */
class A 
{
    public static function foo()
    {
        //self::who();
        static::who();
    }

    public static function who()
    {
        var_dump(__CLASS__) ;
    }
}

class B extends A
{
    public static function test()
    {
        //self::foo();
        parent::foo();
    }

    public static function who()
    {
        var_dump("Hello, world");
        var_dump(__CLASS__);
    }
}

$b = new B();
var_dump($b->test());




