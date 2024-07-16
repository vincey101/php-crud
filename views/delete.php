<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../controllers/userController.php';

$userController = new UserController();

$id = $_GET['id'] ?? '';

if ($id) {
    $userController->delete($id);
}

header('Location: ../public/index.php');
exit();
;
