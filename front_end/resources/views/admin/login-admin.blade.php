<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <!-- Title edit Here! -->
    <div class="Title">
        <h3>Login Admin Sihadir</h3>
    </div>


    <!-- The Login Form -->
    <div>
    <form action="<?php echo route('login-admin'); ?>" method="POST">
        <!-- csrf is laravel verification token. do not touch! -->
        @csrf
        <div class="username-container">
            Username: 
            <input type="text" name="id">
        </div>
        <br>
        <div class="password-container">
            Password:
            <input type="password" name="pass">
        </div>

        <div class="lupaPassword-container">
            <a>lupa password?</a>
        </div>

        <div class="MASUK-container">
            <button type="submit">Masuk</button>
        </div>
    </form>
    </div>

</body>
</html>