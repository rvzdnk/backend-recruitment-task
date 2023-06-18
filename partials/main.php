<?php
require_once "./partials/controllers/UserController.php";
$controller = new UserController();

?>

<div class="container">
<table class="table">
    <thead class="table__head">
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Address</th>
        <th>Phone</th>
        <th>Company</th>
    </thead>
    <tbody class="table__body">
    <?php 
    $users = $controller->handleRequest();
    foreach ($users as $user){
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
<div class = "modal hidden">
    <div class="modal__wrapper-btn">
        <button class="modal__btn--close">⨉</button>
    </div>
    <h3>Add new user</h3>
    <form class="form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="street">Street:</label>
        <input type="text" id="street" name="street" required>
        <label for="zipcode">Zip Code:</label>
        <input type="text" id="zipcode" name="zipcode" required>
        <label for="city">City:</label>
        <input type="text" id="city" name="city" required>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required>
        <label for="company">Company:</label>
        <input type="text" id="company" name="company" required>
        <button type="submit" name="btn--submit">Add User</button>
    </form>
</div>
<div class = "overlay hidden"></div>
<button class = "btn--open">Add new user</button>
</div>
