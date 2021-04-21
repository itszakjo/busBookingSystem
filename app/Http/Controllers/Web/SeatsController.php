<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Seats;
use App\Services\TripsServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeatsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Seats  $seats
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TripsServices $tripsServices)
    {
        $pickup_point = $request->get('pickup_point');
        $drop_point = $request->get('drop_point');
        $trip_id = $request->get('trip_id');

        $data = $tripsServices->getTripAvailableSeatsForWeb($pickup_point, $drop_point, $trip_id);

        echo $data;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Seats  $seats
     * @return \Illuminate\Http\Response
     */
    public function edit(Seats $seats)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Seats  $seats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seats $seats)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Seats  $seats
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seats $seats)
    {
        //
    }
}
