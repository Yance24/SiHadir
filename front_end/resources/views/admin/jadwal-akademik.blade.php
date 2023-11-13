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
            font-family: "Montserrat";
        }
        tbody{
            overflow-y: scroll;
        }
        th {
            text-align: center;
            font-weight: normal;
            background: white;
            position: sticky;
            top: 0;
            box-shadow: 0 2px 2px -1px rgba(0, 0, 0, 0.4);
        }
        th,td{
            padding: 0.25rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;  
            position: relative;
        }

    </style>
</head>




<!-- BUKAN YANG INI BAGIAN JADWAL BUAT ADMIN!!! - Yance -->

<!-- View untuk /admin/schedule tuh di schedule.blade -->













<body style="height: 100vh; overflow:hidden">
    <div class="container-fluid">
        <div class="row">
          <div class="col-2 bg-danger" style="height:100vh;">1</div>
          <div class="col-10 ml-1 px-4 pt-2" style="background-color: #D9D9D9">
            <div class="text-left my-4" style="height: 5vh; background-color: #D9D9D9; font: 40px Montserrat;">User List</div>
            <div style="width: 100%; height:100%; overflow:hidden" class="bg-white rounded">
                <div class="d-flex justify-content-between p-4">
                    <div class="rounded d-flex align-items-center justify-content-center" style="width: 150px; height:50px; background-color: #78A2CC;color:white">+ Tambah</div>
                    <div class="input-group mb-3" style="width: 300px; height: 50px">
                        <div class="input-group-prepend " style="width: 50px; height: 50px">
                          <i style="height: 50px" class="bi bi-search"></i>
                        </div>
                        <input type="text" class="form-control" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                </div>
                <table style="width:96%;" class="table bg-white mx-4 my-1 " >
                    <thead>
                        <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Website</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach ($user as $item)
                        <tr class="m-2">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->website }}</td>
                            <td>
                                <button class="action-button">Update</button>
                                <button class="action-button">Reset</button>
                                <button class="action-button">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
          </div>
        </div>
    </div>


</body>
</html>
