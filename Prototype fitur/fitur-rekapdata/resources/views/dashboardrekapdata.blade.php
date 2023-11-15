<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Semester</title>
</head>
<body>
    <h1>Mahasiswa Semester</h1>

    @foreach ($groupedData as $semester => $uniqueClasses)
        <li>
            <strong>Semester {{ $semester }}</strong>
            <ul>
                @foreach($uniqueClasses as $class)
                    <li>
                        <a href="{{ route('rekapdata', ['class' => $class->kelas]) }}">
                            {{ $class->kelas }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
    

</body>
</html>
