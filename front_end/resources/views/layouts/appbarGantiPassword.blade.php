@section('css-js')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"> 
        <link href="{{ asset('assets/css/layouts/appbarGantiPassword.css') }}" rel="stylesheet">

    <script src="{{ asset('assets/js/layouts/appbarGantiPassword.js') }}"></script>

</section>
<header>
    <div class="appbar fixed-top">
        <a href="{{route('dashboard')}}" class="mt-5 ps-2">
            <i class="fa-solid fa-arrow-right fa-rotate-180 fa-2xl" style="color: #ffffff;"></i>
        </a>
        <div class="mx-auto mt-5">
            <h1 class="text-white">Sihadir</h1>
        </div>
    </div>
</header>

