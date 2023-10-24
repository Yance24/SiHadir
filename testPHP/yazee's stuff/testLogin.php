<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>

    </head>

    <body>
        <h3>== LOGIN ==</h3>
        <br>
        <form action="validation.php" method="post">
            Username: <input type="text" name="id"><br>
            Password: <input type="text" name="pass"><br>
            <button type="submit">Login</button>
        </form>

        <?php
        if(isset($_SESSION["status"]) && $_SESSION["status"] == "failed"){
            echo "Username or password is incorrect";
            $_SESSION["status"] = "";
        }
        ?>
    </body>
</html>