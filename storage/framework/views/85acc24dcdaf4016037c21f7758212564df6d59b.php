<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">

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

    <?php echo $__env->yieldContent('styles'); ?>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    <?php echo e(config('app.name', 'Laravel')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(Route::has('register')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Logout')); ?>

                                    </a>

                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <script>
        function countChecker(elm) {
            // var checkboxes = document.getElementsByClassName("checkbox-btn");
            var selected = [];
            if(elm.is(":checked")){
                selected.push(elm.value);
            }
            document.getElementById("stop_points").value = selected.join();
        }
    </script>

    <script>

        $.ajax({
            url: "<?php echo e(route('station.show')); ?>",
            method: "POST",
            data: {
                start_point: 0,
                end_point: 0,
                _token: "<?php echo e(csrf_token()); ?>"
            },
            success: function (data) {
                $('.stop_list').html(data)

            }

        });

        

            
                
                
                
                    
                    
                    
                

                
                    
                    
                

            

        

        

            
                
                
                
                    
                    
                    
                

                
                    
                    


                

            

        


    </script>

    <?php echo $__env->yieldContent('scripts'); ?>


</body>
</html>
<?php /**PATH D:\Laravel pros\busBookingSystem\resources\views/admin/app.blade.php ENDPATH**/ ?>