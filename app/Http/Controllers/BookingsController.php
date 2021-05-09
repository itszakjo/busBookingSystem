<?php

namespace App\Http\Controllers;


use App\Services\TripService;
use Illuminate\Http\Request;


class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, TripService $tripsService)
    {
//       http://127.0.0.1:8000/api/get_seats?trip_id=7?pickup_point=1?drop_point=2
        $request->validate([
            'trip_id' => 'required|integer',
            'pickup_point' => 'required|integer',
            'drop_point' => 'required|integer',
        ]);


        return $tripsService->getTripAvailableSeats($request->trip_id, $request->pickup_point, $request->drop_point);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , TripService $tripsService)
    {

        $request->validate([
            'seat_id' => 'required|integer',
            'trip_id' => 'required|integer',
            'pickup_point' => 'required|integer',
            'drop_point' => 'required|integer',
        ]);

        $reservation = $tripsService->bookSeat($request->seat_id, $request->pickup_point, $request->drop_point, $request->trip_id);

        if ($reservation == null) {
            return response()->json([
                'error' => 'Seat is not available',
            ], 400);
        }

        return $reservation;


    }


}
