<?php

/**
 * Static
 */

class A
{
    public static $message = "Hi world";

    public static function foo()
    {
        //return $this->message => 정적 메소드 에서는 this를 사용할수없다
        return self::$message;
    }
}

var_dump(A::$message);


//가변 네임으로 클래스는 접근이 가능 하지만 property에는 접근 할수없다 
$classname = "A";
$a = new $classname();
var_dump($a->foo());



