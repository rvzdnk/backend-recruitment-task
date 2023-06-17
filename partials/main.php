<?php
require_once "./partials/controllers/UserController.php";
$controller = new UserController();
$users = $controller->getAllUsers();
?>

<table>
    <tr>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Company</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['name']; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['address']['street']; ?></td>
        <td><?php echo $user['phone']; ?></td>
        <td><?php echo $user['company']['name']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>


