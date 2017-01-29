<?php

require_once 'Controller/ListController.php';

$controller = new ListController();

parse_str($_SERVER['QUERY_STRING'], $action);

switch ($action['action']) {
    case 'list':
        $controller->index();
        break;
    case 'add':
        $controller->add();
        break;
    case 'delete':
        $controlle
    default:
        $controller->noResourceFound();
        break;
}

