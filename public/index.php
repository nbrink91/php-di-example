<?php

use NicholasBrink\Controller\TheController;

require '../vendor/autoload.php';

$builder = new DI\ContainerBuilder();
$builder->addDefinitions('../config/definitions.php');
$container = $builder->build();

$controller = new TheController($container);

echo $controller->doStuff();