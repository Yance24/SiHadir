<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login Admin</h2>

@if($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf
    <label for="nama">id:</label>
    <input type="text" name="id_admin" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
