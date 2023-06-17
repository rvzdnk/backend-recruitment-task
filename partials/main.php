<?php
require_once "./partials/controllers/UserController.php";
$controller = new UserController();
$users = $controller->getAllUsers();
?>

<table class="table">
    <thead class="table_head">
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Company</th>
    </thead>
    <tbody class="table__body">
    <?php foreach ($users as $user){
        echo
        "<tr>
            <td> ".$user['name']." </td>
            <td> ".$user['username']." </td>
            <td> ".$user['email']." </td>
            <td> ".$user['address']['street'].", ".$user['address']['zipcode']." ".$user['address']['city']." </td>
            <td> ".$user['phone']." </td>
            <td> ".$user['company']['name']." </td>
        </tr>";
    };
    ?>
    </tbody>
</table>


