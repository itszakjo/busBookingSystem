<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>


        body{

            font-family: 'Cairo', sans-serif !important;

        }

        .sourcetd{

            width:10px;
        }
        .card{
            padding-bottom: 10px;
            box-shadow: 1px 1px 12px #00000026;


        }
        .card-title{
            font-weight: 600 !important;

        }
        h4 {
            font-size: 2.35rem !important;

        }


        #searchmo{

            border: 1px solid #000;
            padding: 3px 10px;
            border-radius: 5px;

        }
        #searchmo::placeholder{

            color:#000 ;
        }

        .searchli{

            padding: 10px;
        }
        .searchdiv:hover{

            background: rgba(250, 255, 57, 0.07);

        }

        .searchdp{
            overflow-y: scroll;
            height: 24vh;
            width: 100%;

        }

        /* .btn-primary {*/
        /*color: #3490dc !important;*/
        /*background-color: #3490dc00 !important;*/
        /*border-color: #3490dc;*/
        /*        }*/



        .btn-primary {
            color: #3490dc;
            background-color: #3490dc00;
            border-color: #3490dc;
        }

        .btn-primary:hover {
            color: #fff;
        }
        .light-table-filter {
            border: 1px solid #ccc;
            margin-bottom: 14px;
            border-radius: 7px;
            padding: 9px;
            width: 50%;
        }

        #wbbmodal .wbbm-inp-row input {
            display: block;
            height: 34px;
            padding: 2px 5px;
            line-height: 1.42857143;
            font-size: 14px;
            width: 100%;
            border: 1px solid #aaa;
            outline: none;
            box-sizing: border-box;
            border-radius: 0;
        }
    </style>

    @yield('styles')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
        function countChecker(elm) {
            var checkboxes = document.getElementsByClassName("checkbox-btn");
            var selected = [];
            for (var i = 0; i < checkboxes.length; ++i) {
                if(checkboxes[i].checked){
                    selected.push(checkboxes[i].value);
                }
            }
            document.getElementById("stop_points").value = selected.join();
        }
    </script>

    <script>

        $.ajax({
            url: "{{ route('station.show') }}",
            method: "POST",
            data: {
                start_point: 0,
                end_point: 0,
                _token: "{{ csrf_token() }}"
            },
            success: function (data) {
                $('.stop_list').html(data)

            }

        });

        $("body").on("change", ".start_point_select", function () {

            $.ajax({
                url: "{{ route('station.show') }}",
                method: "POST",
                data: {
                    start_point: $(this).val(),
                    end_point: $('.end_point_select').val(),
                    _token: "{{ csrf_token() }}"
                },

                success: function (data) {
                    $('.stop_list').html(data)
                    $('#stop_points').val('');
                }

            });

        });

        $("body").on("change", ".end_point_select", function () {

            $.ajax({
                url: "{{ route('station.show') }}",
                method: "POST",
                data: {
                    start_point: $('.start_point_select').val(),
                    end_point:  $(this).val(),
                    _token: "{{ csrf_token() }}"
                },

                success: function (data) {
                    $('.stop_list').html(data);
                    $('#stop_points').val('');


                }

            });

        });


    </script>

    @yield('scripts')


</body>
</html>
