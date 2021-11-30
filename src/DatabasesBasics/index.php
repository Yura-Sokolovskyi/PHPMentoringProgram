<?php

session_start();

require_once dirname(__DIR__, 2).'/vendor/autoload.php';

use App\DatabasesBasics\config\EntityManagerBuilder;
use App\DatabasesBasics\Controllers\MainController;

$baseUrl = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$controller = new MainController(EntityManagerBuilder::build(), $baseUrl);

$_SESSION['page'] = $_REQUEST['page'] ?? 1;
$_SESSION['sort'] = $_REQUEST['sort'] ?? false;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['remove'])) {
        $controller->delete($_GET['remove']);
    } elseif (isset($_GET['name'])) {
        $controller->show($_GET['name']);
    } else {
        $controller->show();
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $controller->update($_REQUEST);
    } else {
        $controller->create($_POST);
    }
}
