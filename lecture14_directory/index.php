<?php

$root = dirname(__DIR__.'/lecture14_directory');
var_dump($root);
/**
 * Directory
 *
 *  1. read()
 *  2. rewind()
 *
 */

$dir = dir($root. '/functions');
//var_dump($dir);

// 특징은 한번 긁어 오면 두번째는 긁어올수없다
while ($dirname = $dir->read()) {
    var_dump($dirname);
}

//$dir->rewind();

//while ($dirname = $dir->read()) {
//    var_dump($dirname);
//}
//정확하게 어떻게 opendir를 사용하는지 그리고 $dir->handle을 사용하는지 모르겠다
$dir->handle = opendir($root.'/lang');
var_dump($dir);
while ($dirname = $dir->read()) {
    var_dump($dirname);
}

$dir->close();