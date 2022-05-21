<?php

/**
 *  Classes/Objects Functions
 * 
 *  classes api에 대해서 알아보기
 *  1. class_alias
 */

class A
{
    public $message = 'Hello, world';

    public function foo()
    {
        return $this->message;
    }
}

class B
{
}
// 클래스 이름이 너무 길때 사용이 가능하다
class_alias('A','MyClass');

/**
 *  Exists
 *  exists api 에 대해서 알아보기
 * 
 *  1. class_exists
 *  2. property_exists
 */
var_dump(class_exists('MyClass'),property_exists('MyClass','message'));

/**
 *  Get
 *
 *  get api 에 대해서 알아보기
 *  1. get_class
 *  2. get_class_vars
 *  3. get_class_methods
 *  4. get_class_parents
 *  5. get_declared_classes
 */
$a = new MyClass();
$b = new B();
//var_dump(get_class($a),get_class_vars('MyClass'),get_class_methods('MyClass'));

//var_dump(get_declared_classes());

//var_dump(
//    get_object_vars($a),
//    get_parent_class($b)
//);

/**
 * is
 * 
 *  is api 에 대해서 알아보기
 *  1. is_a
 *  2. is_subclass_of
 *
 *
 */
var_dump(is_a($a,'MyClass'),
    is_subclass_of($b,'MyClass'),
    $a instanceof MyClass,
    $b instanceof MyClass
);