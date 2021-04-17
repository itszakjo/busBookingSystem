<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trips;
use Illuminate\Http\Request;

class TripsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Trips::paginate(10);

        return view('admin.trips' , compact('data'));
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
        if(Trips::updateOrCreate(
            [ 'id'=> $request->get('id') ] ,
            [
                'name' => $request->get('name') ,
                'route' => $request->get('route') ,
                'date' => $request->get('date') ,
                'departure_at' => $request->get('departure_at') ,
                'arrival_at' => $request->get('arrival_at') ,
                'seat_price' => $request->get('seat_price') ,

            ]
        )){

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function show(Trips $trips)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function edit(Trips $trips)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trips $trips)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trips  $trips
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(Trips::where('id', $id)->delete()){

            return redirect()->back();

        }else{

            echo 'Error!';
        }
    }
}
