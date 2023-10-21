<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <style>
        * {
            font: "Montserrat";
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
          <div class="col-2 bg-danger" style="height:100vh">1</div>
          <div class="col-10 ml-1 px-4 pt-2" style="background-color: #D9D9D9">
            <div class="text-left my-4" style="height: 5vh; background-color: #D9D9D9; font: 40px Montserrat;">User List</div>  
            <div style="width: 100%; height:100%" class="bg-white">A</div>
            {{-- <table border="1" style="border-radius: 15px;" class="table table-striped bg-white" >
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Gender</th>
                    </tr>
                </thead>
        
                @foreach ($user as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->website }}</td>
                    <td>{{ $item->gender }}</td>
                </tr>
                @endforeach
            </table> --}}
          </div>
        </div>
    </div>
      
    
</body>
</html>