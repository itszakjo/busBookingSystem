<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Book Trip</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }

            .seatSelection {
                text-align: center;
                padding: 5px;
                margin: 15px;}

            .seatsReceipt {text-align: center;}

            .seatNumber {
                display: inline;
                padding: 10px;
                background-color: #5c86eb;
                color: #FFF;
                border-radius: 5px;
                cursor: default;
                height: 25px;
                width: 25px;
                line-height: 25px;
                text-align: center;
            }

            .seatRow {padding: 10px;}

            .seatSelected {
                background-color: lightgreen;
                color: black;
            }

            .seatUnavailable {background-color: gray;}

            .seatRowNumber {
                clear: none;
                display: inline;
            }

            .hidden {display: none;}

            .seatsAmount {max-width: 2em;}

        </style>

    </head>

    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900" >


            <div class="col-md-8" style="margin-top: 55px" >
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                   <h1>  Book {{ $info->name }} </h1>
                </div>

                <div class="seatSelection col-lg-12">
                    <div class="seatsChart col-lg-4">

                        Please Select Pickup & drop location

                    </div>

                    <div class="seatsReceipt col-lg-2">
                        <ul id="seatsList" class="nav nav-stacked"></ul>
                    </div>


                    <div class=" col-lg-3">
                        <form class="form-horizontal" action="{{ route('booking.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <!-- hidden Fields -->
                            <input hidden type="text" class="form-control trip_id" name="trip" placeholder="ID" value="{{ $info->id }}" required  >
                            <input hidden type="text" class="form-control seat_price" name="seat_price" placeholder="Seat Price" value="{{ $info->seat_price }}" required  >

                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required  >
                            </div>

                            <div hidden class="form-group">
                                <input type="text" class="form-control seats_ids" name="seats" placeholder="Seats" required  >
                            </div>

                            @php $stations = DB::table('stations')->get(); @endphp

                            <div class="form-group">
                                <select class="form-control pickup_point_select " name="pickup_point" required>
                                    <option class="form-control" selected disabled >Select Pickup Location</option>
                                    @foreach($stations as $key => $station)
                                        <option class="form-control" value="{{ $station->id }}" >{{ $station->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <select class="form-control drop_point_select" name="drop_point" required>
                                    <option class="form-control" selected disabled >Select Drop Location</option>
                                    @foreach($stations as $key => $station)
                                        <option class="form-control" value="{{ $station->id }}" >{{ $station->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <input type="text"  class="form-control txtSubTotal" name="total_price" placeholder="Total Price" value="0" required  >
                            </div>

                            <br>

                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </form>
                    </div>
                </div>

                <br>
                <br>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>

    </body>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script>

    // Clicking any seat
        $("body").on("click", ".seatNumber", function () {


            // only select if the seat is availble
            if (!$(this).hasClass("seatUnavailable")){

                // If selected, unselect it
                if ($(this).hasClass("seatSelected")) {
                    var thisId = $(this).attr('id');
                    var price = $('.seat_price').val();
                    $(this).removeClass("seatSelected");
                    $('#seatsList .' + thisId).remove();
                    // Calling function to update checkout total price.
                    removeFromCheckout(price);
                }
                else{

                    // else, select it
                    // getting values from Seat
                    var thisId = $(this).attr('id');
                    var id = thisId.split("_");
                    var price = $('.seat_price').val();
                    $(this).addClass("seatSelected");

                    addToCheckout(price);

                }

                checkSeats();

            }
        }
    );

    // checking seats
    function checkSeats() {
        $(".seats_ids").val("");
        var seatSerial = "";
        $(".seatNumber").each(function() {
            if($(this).hasClass("seatSelected")){
                seatSerial += $(this).attr("id")+", ";
            }
        });
        $(".seats_ids").val(seatSerial);
    }

    // Add seat to checkout
    function addToCheckout(thisSeat) {
        var seatPrice = parseInt(thisSeat);
        var num = parseInt($('.txtSubTotal').val());
        num += seatPrice;
        // num = num.toString();
        $('.txtSubTotal').val(num);
    }

    // Remove seat from checkout
    function removeFromCheckout(thisSeat) {
        var seatPrice = parseInt(thisSeat);
        var num = parseInt($('.txtSubTotal').val());
        num -= seatPrice;
        // num = num.toString();
        $('.txtSubTotal').val(num);
    }


    </script>

    <script>

        $("body").on("change", ".pickup_point_select", function () {

            var pickup_point = $(this).val();
            var drop_point = $('.drop_point_select').val();
            var trip_id = $('.trip_id').val();


            $.ajax({
                url: "{{ route('seats.show') }}",
                method: "POST",
                data: {
                    pickup_point: pickup_point,
                    drop_point:drop_point,
                    trip_id:trip_id,
                    _token: "{{ csrf_token() }}"
                },

                success: function (data) {

                    // alert(data)
                    $('.seatsChart').html(data)
                }

            });

        });

        $("body").on("change", ".drop_point_select", function () {

            var pickup_point = $('.pickup_point_select').val();
            var drop_point = $(this).val() ;
            var trip_id = $('.trip_id').val();


            $.ajax({
                url: "{{ route('seats.show') }}",
                method: "POST",
                data: {
                    pickup_point: pickup_point,
                    drop_point:drop_point,
                    trip_id:trip_id,
                    _token: "{{ csrf_token() }}"
                },

                success: function (data) {
                    // alert(data)

                    $('.seatsChart').html(data)
                }

            });

        });

    </script>

</html>
