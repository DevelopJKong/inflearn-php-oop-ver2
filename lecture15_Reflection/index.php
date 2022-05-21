<?php


class A
{
    private string $message = 'Hello, world';

    public function __construct(string $message)
    {
        $this->message = $message;
    }

}

class B extends A
{
}


/**
 *  ReflectionClass
 *
 *
 */

$refClassA = new ReflectionClass('\A');
var_dump($refClassA->getProperties(ReflectionProperty::IS_PUBLIC));

$refClassB = new ReflectionClass('\B');
var_dump($refClassB->isSubclassOf('\A'));


/**
 * ReflectionProperty
 */

$messageProperty = $refClassA->getProperty('message');
//var_dump($messageProperty->getType());
var_dump($messageProperty->getType()->getName());







