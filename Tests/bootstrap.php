<?php

$symfonyPath = __DIR__ . '/../../../../symfony/src';
require_once $symfonyPath.'/Symfony/Component/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespaces(array(
    'Nanaweb\JapaneseHolidayBundle' => __DIR__ . '/../../..',
    'Symfony' => $symfonyPath,
));
$loader->register();
