<?php

require_once '../controllers/userController.php';

$userController = new UserController();

$id = $_GET['id'] ?? '';
$user = null;

if ($id) {
    $users = $userController->read();
    foreach ($users as $u) {
        if ($u['id'] == $id) {
            $user = $u;
            break;
        }
    }
}

if (!$user) {
    echo "User not found.";
    exit;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <form action="../public/index.php?action=update" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        <br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
