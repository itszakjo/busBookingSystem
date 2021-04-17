<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stations;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class StationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Stations::paginate(10);

        return view('admin.stations' , compact('data'));
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
    public function store(Request $request){

        if(Stations::updateOrCreate(
            [ 'id'=> $request->get('id') ] ,
            [
                'name' => $request->get('name') ,

            ]
        )){

            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stations  $stations
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $start_point = $request->get('start_point');
        $end_point = $request->get('end_point');

        $data = Stations::where(
            [
                ['id' , '!=' , $start_point],
                ['id' , '!=' , $end_point]
            ]

        )->get();

        $output = "";

        foreach ($data as $row){

            $output .='
                     <li>
                        <label class="checkbox-inline">
                            <input type="checkbox" class="checkbox-btn" value="'.$row->name.'" onchange=" countChecker();"> '.$row->name.'
                        </label>
                    </li>';

        }

        echo $output;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stations  $stations
     * @return \Illuminate\Http\Response
     */
    public function edit(Stations $stations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stations  $stations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stations $stations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stations  $stations
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(Stations::where('id', $id)->delete()){

            return redirect()->back();

        }else{

            echo 'Error!';
        }

//        try{
//
//            Stations::where('id', $id)->delete();
//
//            return redirect()->back();
//
//        }catch(QueryException $e){
//
//            dd($e->getMessage());
//
//        }


    }
}
