<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Seats;
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
    public function show(Request $request)
    {

        $pickup_point = $request->get('pickup_point');
        $drop_point = $request->get('drop_point');
        $trip_id = $request->get('trip_id');

        $seats = Seats::get();
        $output = "";


        foreach($seats->chunk(4) as $seat) {

            $output .= ' <div class="seatRow">';

            foreach ($seat as $row) {

                $checkSeatAvailability = DB::table('booked_seats')
                    ->where([
                        ['ref_seat', $row->name],
                        ['ref_trip', $trip_id],
                        ['ref_pickup_point', $pickup_point],
                        ['ref_drop_point', $drop_point],
                    ])->first();

                $output .= '<div style="margin:2px;cursor:pointer" id="'.$row->name.'" title="" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatNumber';

                if($checkSeatAvailability !=null){ $output .=" seatUnavailable";}

                $output .='">'.$row->name.'</div>';
            }

            $output .= '</div>';

        }

        echo $output;

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
