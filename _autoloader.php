<?php

require_once(__DIR__.'/vendor/autoload.php');

$loader = new Nette\Loaders\RobotLoader;

// Add directories for RobotLoader to index
$loader->addDirectory(__DIR__ . '/src');

// And set caching to the 'temp' directory
$loader->setTempDirectory(__DIR__ . '/temp');
$loader->register(); // Run the RobotLoader