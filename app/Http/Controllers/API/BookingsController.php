<?php

namespace App\Http\Controllers\API;

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
    public function index(Request $request, TripsServices $tripsServices)
    {


        // here we don't create new seats for each trip , instead , we have fixed number of seats ,
        // and we only store the booked seat id ,
        // if we would like to retrieve the available seats for a specific route , we simply get the unstored seats
        // in my perspective , this is a lot better than having a messy table with lots of seats for each single trip

        $pickup_point = $request->input('pickup_point');
        $drop_point = $request->input('drop_point');

        $request->validate([
            'pickup_point' => 'required|integer',
            'drop_point' => 'required|integer',
        ]);

        $response  = $tripsServices->getTripAvailableSeatsForAPI($pickup_point,$drop_point);

        return $response;

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
    public function store(Request $request , TripsServices $tripsService)
    {

        $name=  $request->get('name') ;
        $trip =  $request->get('trip');
        $pickup_point = $request->get('pickup_point');
        $drop_point = $request->get('drop_point');
        $seats = $request->get('seats');
        $total_price =  $request->get('total_price');

        $request->validate([
            'trip' => 'required|integer',
            'total_price' => 'required|numeric',
            'pickup_point' => 'required|integer',
            'drop_point' => 'required|integer',
        ]);

        $response  = $tripsService->bookTrip($name, $trip , $pickup_point, $drop_point , $seats , $total_price);

        return $response;


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
    public function destroy($id)
    {
       //
    }
}
