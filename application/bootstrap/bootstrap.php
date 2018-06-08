<?php
require_once '../vendor/autoload.php';

use CuisineHelper\Library\Kernel\Kernel as Kernel;
use \Exception as Exception;

try {
    $kernel = Kernel::getInstance();

} catch ( Exception $e ) {
    print $e->getMessage();
    exit;
}
