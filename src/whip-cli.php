<?php
/**
 * Entry point.
 */
require_once './vendor/autoload.php';

use Slicvic\Whip\App;
use Slicvic\Whip\Cli\Input\Input;
use Slicvic\Whip\Cli\Output\Output;
use Slicvic\Whip\SearchEngine\SearchEngine;

App::$defaultDataFile = __DIR__ . '/../data/cars.json';
$app = new App(new Input, new Output, new SearchEngine);
$app->run();
