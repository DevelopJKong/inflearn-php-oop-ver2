<?php
/**
 * Reference
 */

$message = 'Hello, world';
$sayHello =& $message;

$sayHello = 'Who are you';
var_dump($sayHello);
echo "<br/>";

/**
 * Functions and Methods
 */

function foo()
{
    //global $message;
    $message =& $GLOBALS['message'];
    $message = 'Bye';
}

foo();
var_dump($message);

function foo2(&$message)
{
    $message = 'Hello,world';
}

foo2($message); // 참조 형식일때는 직접적으로 줄수없다
var_dump($message);

class MyClass
{
    public $message = 'Hello, world';

    public function &getMessage()
    {
        return $this->message;
    }
}

$myclass = new MyClass();
$sayHello =& $myclass->getMessage();
$sayHello= 'Bye';

var_dump($myclass->message);

/**
 * unset
 */

$sayHello=& $message;
unset($sayHello);

var_dump($message);










