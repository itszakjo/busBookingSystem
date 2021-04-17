<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

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
                   <h1> Bus Booking System </h1>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" style="padding-top: 15px">
                    <div class="col-md-12">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control from_start_point">
                                    <option selected disabled>From</option>
                                    @foreach($stations as $station)
                                        <option value="{{  $station->id }}" >{{ $station->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <select class="form-control to_end_point" >
                                    <option selected disabled>To</option>
                                    @foreach($stations as $station)
                                        <option value="{{  $station->id }}" >{{ $station->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <input type="date" class="form-control trip_date">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="form-group">
                                <a id="findTrip" type="button" class="btn btn-primary form-control" >Find</a>
                            </div>
                        </div>
                    </div>
                </div>

                <br>
                <br>

                <div id="trip_list">
                    <!--<div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                        <div class="col-md-12">

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Route </label>
                                        <h4>New Trip</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Date </label>
                                        <h4>New Trip</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Departure at </label>
                                        <h4>New Trip</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Arrival at	 </label>
                                        <h4>New Trip</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Seat Price	 </label>
                                        <h4>New Trip</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> 	 </label>
                                        <a href="" class="btn btn-primary form-control" data-toggle="modal" data-target="#book_trip">Book This</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr> -->
                </div>

                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </div>
            </div>
        </div>

    </body>


    <div class="modal fade" id="book_trip" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> New Station  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  class="form-horizontal" action="{{ route('station.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Name </label>
                            <input hidden type="text" class="form-control" name="id" value="0" required  >
                            <input type="text" class="form-control" name="name" required  >
                        </div>

                        <div class="seatSelection col-lg-12">

                            <div class="seatsChart col-lg-6">
                                <div class="seatRow">
                                    <div class="seatRowNumber">
                                        A
                                    </div>

                                    <div id="1_1" title="" role="checkbox" value="45" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber seatUnavailable">1</div>
                                    <div id="1_2" role="checkbox" value="45" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">2</div>
                                    <div id="1_3" role="checkbox" value="45" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">3</div>
                                    <div id="1_4" role="checkbox" value="45" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber seatUnavailable">4</div>


                                </div>
                                <div class="seatRow">
                                    <div class="seatRowNumber">
                                        B
                                    </div>

                                    <div id="2_1" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">1</div>
                                    <div id="2_2" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber seatUnavailable">2</div>
                                    <div id="2_3" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">3</div>
                                    <div id="2_4" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">4</div>

                                </div>

                                <div class="seatRow">
                                    <div class="seatRowNumber">
                                        C
                                    </div>

                                    <div id="2_1" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">1</div>
                                    <div id="2_2" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber seatUnavailable">2</div>
                                    <div id="2_3" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">3</div>
                                    <div id="2_4" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">4</div>

                                </div>

                                <div class="seatRow">
                                    <div class="seatRowNumber">
                                        D
                                    </div>
                                    <div id="2_1" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">1</div>
                                    <div id="2_2" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber seatUnavailable">2</div>
                                    <div id="2_3" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">3</div>
                                    <div id="2_4" role="checkbox" value="42" aria-checked="false" focusable="true" tabindex="-1" class=" seatNumber ">4</div>

                                </div>

                            </div>
                        </div>


                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script>

    $('#findTrip').click(function () {

        var start_point = $('.from_start_point').val();
        var end_point = $('.to_end_point').val();
        var date = $('.trip_date').val();

        // alert('from' + start_point + "to :" + end_point + "date" + date)

        $.ajax({
            url: "{{ route('trip.search') }}",
            method: "POST",
            data: {
                start_point: start_point,
                end_point: end_point,
                date: date,
                _token: "{{ csrf_token() }}"
            },

            success: function (data) {

                $('#trip_list').html(data)

            }

        });

    });
</script>

</html>
