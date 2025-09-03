<?php
require_once __DIR__ . '/../../../app/controllers/CategoryController.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

$controller = new CategoryController();

switch ($action) {
    case 'create':
        break;

    default:
        $controller->index();
        break;
}