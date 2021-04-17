<?php

namespace App\Http\Controllers\Web;

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
    public function store(Request $request)
    {

        if(Bookings::create(
            [
                'name' => $request->get('name') ,
                'trip' => $request->get('trip') ,
                'pickup_point' => $request->get('pickup_point') ,
                'drop_point' => $request->get('drop_point') ,
                'seats' => $request->get('seats') ,
                'booking_date' => Carbon::today()->toDateString(),
                'total_price' => $request->get('total_price') ,

            ]
        )){

            $seats =  explode(",",$request->get('seats'));
            for($i=0; $i<count($seats)-1;$i++){

                if(BookedSeats::create([
                    'ref_seat'=>$seats[$i]  ,
                    'ref_trip'=>$request->get('trip') ,
                    'ref_pickup_point'=>$request->get('pickup_point'),
                    'ref_drop_point'=> $request->get('drop_point')
                ])){

                }else{

                    echo 'Error while booking';
                }

            }


            return redirect()->back();


        }else{

            echo "error !";
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
