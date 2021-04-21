<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\BookedSeats;
use App\Models\Bookings;
use App\Models\Seats;
use App\Models\Trips;
use App\Services\TripsServices;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $info = Trips::where('id' , $id)->first();

        $seats = Seats::get();

        return view('web.book_trip' , compact('info' , 'seats'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TripsServices $tripsService)
    {
        $name=  $request->get('name') ;
        $trip =  $request->get('trip');
        $pickup_point = $request->get('pickup_point');
        $drop_point = $request->get('drop_point');
        $seats = $request->get('seats');
        $total_price =  $request->get('total_price');

        $response  = $tripsService->bookTrip($name, $trip , $pickup_point, $drop_point , $seats , $total_price);

        if($response->getData()->status == 200){
            return redirect()->back();
        }else{
            echo 'Error !';
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function show(Bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function edit(Bookings $bookings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bookings $bookings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bookings  $bookings
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(Bookings::where('id', $id)->delete()){

            return redirect()->back();

        }else{

            echo 'Error!';
        }
    }
}
