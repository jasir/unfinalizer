<?php
// Change original ClassLoader name to ClassLoaderModified

$source = file_get_contents(__DIR__ . '/../../composer/ClassLoader.php');
$source = substr($source, 5);
$source = str_replace('class ClassLoader', 'class ClassLoaderModified', $source);
eval($source);

require_once __DIR__ . '/src/ClassLoader.php';
