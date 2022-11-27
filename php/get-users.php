<?php
include('connection.php');

/* USER TEMPLATE

<div class="user">
    <div class="id-container">
        #<span id="id">1</span>
    </div>
    <div class="info">
        <p class="name">Nome: <span>Administrador</span></p>
        <p class="email">E-mail: <span>admin@admin.com</span></p>
        <p class="password">
            Senha:
            <input type="password" value="12345678" disabled>
        </p>
    </div>
    <div class="option">
        <label id="showPassword">
            <input type="checkbox" id="showPasswordInput" class="hide">
        </label>
        <div id="deleteUser"></div>
    </div>
</div>
*/

$sql = 'SELECT * FROM users';
$statement = $conn->query($sql);
$users = $statement->fetchall();

function displayUsers() {
    global $users;
    foreach ($users as $user) {
        ?>
        
        <div class="user">
            <div class="id-container">
                #<span id="id"><?php echo $user['id']; ?></span>
            </div>
            <div class="info">
                <p class="name">Nome: <span><?php echo $user['name']; ?></span></p>
                <p class="email">E-mail: <span><?php echo $user['email']; ?></span></p>
                <p class="password">
                    Senha:
                    <input type="password" value="<?php echo $user['password']; ?>" disabled>
                </p>
            </div>
            <div class="option">
                <label id="showPassword">
                    <input type="checkbox" id="showPasswordInput" class="hide">
                </label>
                <div id="deleteUser"></div>
            </div>
        </div>
        
        <?php
    }
}


?>