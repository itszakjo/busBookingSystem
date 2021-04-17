<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\BookedSeats;
use App\Models\Bookings;
use App\Models\Seats;
use App\Models\Trips;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // here we don't create new seats for each trip , instead , we have fixed number of seats ,
        // and we only store the booked seat id ,
        // if we would like to retrieve the available seats for a specific route , we simply get the unstored seats
        // in my perspective , this is a lot better than having a messy table with lots of seats for each single trip

        $pickup_point = $request->input('pickup_point');
        $drop_point = $request->input('drop_point');
        $seats = Seats::get();

        foreach ($seats as $row) {


            $checkSeat = BookedSeats::where('ref_drop_point' ,$drop_point )
                ->where('ref_pickup_point' ,  $pickup_point)
                ->where('ref_seat' ,$row->name)
                ->first();

            // if the seat is not booked , add it
                if($checkSeat == null){
                    $data[] =[
                        'id' => $row->id,
                        'name' => $row->name,
                    ];
                }
            }

        return response()->json(['status' => 200, 'data' => $data]);

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

        if(Bookings::create(
            [
                'name' => $request->input('name') ,
                'trip' => $request->input('trip') ,
                'pickup_point' => $request->input('pickup_point') ,
                'drop_point' => $request->input('drop_point') ,
                'seats' => $request->input('seats') ,
                'booking_date' => Carbon::today()->toDateString(),
                'total_price' => $request->input('total_price') ,

            ]
        )){

            $seats =  explode(",",$request->input('seats'));
            for($i=0; $i<count($seats)-1;$i++){

                if(BookedSeats::create([
                    'ref_seat'=>$seats[$i]  ,
                    'ref_trip'=>$request->input('trip') ,
                    'ref_pickup_point'=>$request->input('pickup_point'),
                    'ref_drop_point'=> $request->input('drop_point')
                ])){

                }else{

                    return response()->json(['status' => 400 , 'message' => 'Error']);
                }

            }

            return response()->json(['status' => 200 , 'message' => 'Booked Successfully !']);


        }else{

            return response()->json(['status' => 400 , 'message' => 'Error !']);
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
    public function destroy($id)
    {
       //
    }
}
