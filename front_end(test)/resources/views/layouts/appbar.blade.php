<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

.appbar {
            display: none;
            height: 100px;
            width: 100%;
            background-color: #78A2CC;

        }
        @media screen and (min-width: 769px) {
            .appbar {
                display: none;
            }
        }

        @media screen and (max-width: 768px) {

            .appbar {
                display: flex;
                width: 100%;

            }
        }
    </style>
</head>

<body>
    {{-- APP BAR MOBILE VERSION --}}
    <div class="appbar">
        <div class="mt-5 ps-2">
            <i class="fa-solid fa-arrow-left fa-xl"></i>
        </div>
        <div class="mx-auto mt-5">
            <h1 class="">Sihadir</h1>
        </div>
    </div>
    {{-- END --}}
</body>

</html>
