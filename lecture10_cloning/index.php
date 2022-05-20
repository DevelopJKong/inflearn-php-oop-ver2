<?php

/**
 * Compare
 */

$class1 = new stdClass(); // 정확히 stdClass는 뭐지?
$class2 = new stdClass(); // stdClass 임의적으로 class를 만들어준다고 생각하면 좋을거 같다

//$class1->sayHello = 'hello world';

var_dump($class1 === $class2);

/**
 * Copy
 */

//$class3 = $class1 = <Object Id>
$class3 = $class1; // class 복사 위에 있는 class를 복사하였습니다
$class3->sayHello = "hello, world";
var_dump($class1->sayHello);


//($class3, $class1) = <Object Id>
$class4 = new stdClass();
$class5 =& $class4;
var_dump($class4);

$class6 = new stdClass();
$class7 = clone $class6;
echo "<hr/>";
var_dump($class7 === $class6);


$array1 = new ArrayObject([1, 2, new ArrayObject([3, 4])]);
$array2 = clone $array1;

echo "<hr/>";
var_dump($array1[2]);
echo "<br/>";
var_dump($array1[2] === $array2[2]);
// 왜 여기서는 같다고 나오는지 모르겠다

/**
 * Shallow Copy vs Deep Copy
 */

// Case 1.

class MyArrayObject implements ArrayAccess, IteratorAggregate // 둘다 제대로 알아둘 필요가 있다
{
    private $container = [];

    public function __construct($array)
    {
        $this->container = $array;
    }

    public function offsetSet(mixed $offset, mixed $value): void
    {
        $this->container[$offset] = $value;
    }

    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset(mixed $offset): void
    {
        unset($this->container[$offset]);
    }

    public function offsetGet(mixed $offset): mixed
    {
        return $this->offsetExists($offset) ? $this->container[$offset] : null;
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->container);
    }

//    public function __clone()
//    {
//        array_walk($this->container, fn(&$value) => is_object($value) ? $value = clone $value : null);
//    }

}

$myArrayObject1 = new MyArrayObject([1,2, new MyArrayObject([3,4])]);

foreach($myArrayObject1 as $key => $value) {
    var_dump($key,$value);
}


//echo "<hr/>";
//var_dump($myArrayObject1[0]);
//
//$myArrayObject2 = clone $myArrayObject1;
//
//var_dump($myArrayObject1[2] === $myArrayObject2[2]);

// Case 2. Serialize

$myArrayObject2 = unserialize(serialize($myArrayObject1));
var_dump($myArrayObject1[2] === $myArrayObject2[2]);

