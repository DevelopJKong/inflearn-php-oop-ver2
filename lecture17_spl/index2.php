<?php

/**
 *  SplFileObject
 */
$file = new SplFileObject(dirname(__DIR__). '/README.md');
//var_dump($file->fread($file->getSize()));


/**
 * SplFileInfo
 */

$fileInfo = $file->getFileInfo();

var_dump($fileInfo->getBasename(),$fileInfo->isDir());

