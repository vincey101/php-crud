<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../controllers/userController.php';

$userController = new UserController();

$action = $_GET['action'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    switch ($action) {
        case 'create':
            $name = $_POST['name'];
            $email = $_POST['email'];
            $userController->create($name, $email);
            break;
        case 'update':
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $userController->update($id, $name, $email);
            break;
        case 'delete':
            $id = $_POST['id'];
            $userController->delete($id);
            break;
    }
    header('Location: ../views/read.php');
    exit();
}

header('Location: ../views/read.php');
exit();

;
