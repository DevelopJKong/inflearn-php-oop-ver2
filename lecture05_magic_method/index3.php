<?php

/**
 * Magic Methods: Serialize
 */

class A
{
    private $message = 'Hello, world';

    public function __sleep()
    {
        return ['message'];
    }

    public function __wakeup()
    {
        var_dump(__METHOD__);
    }
}
$a = new A();

$serialize = serialize($a);
var_dump($serialize);
echo "<br>";

echo "<pre>";
var_dump(unserialize($serialize));
echo "</pre>";

class B implements Serializable
{
    private $message = 'Hello, world';

    function serialize()
    {
        return serialize($this->message);
    }

    function unserialize($serialize)
    {
        $this->message = unserialize($serialize);
    }
}

$b = new B();
echo "<hr/>";
echo "<br>";

$serialized = serialize($b);
var_dump($serialized);
echo "<br>";

var_dump(unserialize($serialized));