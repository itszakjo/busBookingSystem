<?php

namespace App\Http\Controllers\Web;

use App\Models\Stations;
use App\Models\Trips;
use App\Services\TripsServices;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stations = Stations::get();

        return view('web.welcome' , compact('stations'));
    }

    public function searchTrips(Request $request , TripsServices $trips){


        $data = $trips->search($request->get('start_point') ,
                            $request->get('end_point') ,
                            $request->get('date'));

        $output = "";

        if($data->count()>0){

            foreach ($data as $row){

                $output .=' <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                        <div class="col-md-12">

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Route </label>
                                        <h4>'.$row->Route->name.'</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Date </label>
                                        <h4>'.$row->date.'</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Departure at </label>
                                        <h4>'.$row->departure_at.'</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Arrival at	 </label>
                                        <h4>'.$row->arrival_at.'</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> Seat Price	 </label>
                                        <h4>'.$row->seat_price.'</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label> </label>
                                        <a href="'.route('trip.show' , $row->id).'" class="btn btn-primary form-control" data-toggle="modal" data-target="#book_trip">Book This</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <hr>';
            }
        }else{

            $output .= 'There are no trips with your specs currently!';
        }

        echo $output;

    }


    public function show($id){


    }
}
