<?php

/**
 * Closure
 */

function foo()
{
    return 'Hello world';
}

//$foo = fn() => 'Hello world';
//var_dump(Closure::fromCallable('foo'));

class A
{
    public $message = 'Hello, world';
}

$foo = fn () => $this->message;
$a = new A();
//Function call
var_dump($foo->call($a));

//$foo2 = $foo->bindTo($a,null);
//var_dump();

function foo2(\Closure $callback)
{
    var_dump($callback->call(null));
}

foo2(fn () => 'Hello world');








/**
 * From Callable
 */
