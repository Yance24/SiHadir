<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar semester</title>
</head>
<body>
    <h1>Semester List</h1>
    @foreach ($semester as $semester)
    <ul>
        <li>{{ $semester }}</li>
        <ul>
        </ul>
    </ul>   
@endforeach
    
    
    
</body>
</html>