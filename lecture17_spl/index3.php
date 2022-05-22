<?php

/**
 * ArrayIterator
 */

$array = new ArrayObject(['message' => 'Hello, world']);

$arrayIterator = $array->getIterator();

while($arrayIterator->valid()) {
    var_dump($arrayIterator->current());
    $arrayIterator->next();
}


/**
 * DirectoryIterator
 */

$dir = new DirectoryIterator(dirname(__DIR__));

while($dir->valid()){
    //var_dump($dir->current());
    $dir->next();
}



//RecursiveDirectoryIterator

$it = new RecursiveDirectoryIterator(dirname(__DIR__));
//Recursive에 대해서 그래도 정확하게 알아두어야 할거 같다



