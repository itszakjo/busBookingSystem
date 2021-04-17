<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Routes;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Routes::paginate(10);

        return view('admin.routes' , compact('data'));
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
        if(Routes::updateOrCreate(
            [ 'id'=> $request->get('id') ] ,
            [
                'name' => $request->get('name') ,
                'start_point' => $request->get('start_point') ,
                'end_point' => $request->get('end_point') ,
                'stop_points' => $request->get('stop_points') ,

            ]
        )){

            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function show(Routes $routes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function edit(Routes $routes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Routes $routes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Routes  $routes
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if(Routes::where('id', $id)->delete()){

            return redirect()->back();

        }else{

            echo 'Error!';
        }

    }
}
