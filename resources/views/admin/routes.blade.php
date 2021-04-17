@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Trips</div>

                    <div class="">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <br/><br/>

                        <div class="container">


                            <table id="example" class="order-table table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th> Name</th>
                                    <th> Start Point</th>
                                    <th> End Point</th>
                                    <th> Stops </th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td> {{ $data->firstItem() + $key }} </td>
                                    <td><a >{{ $row->name }}</a></td>
                                    <td><a >{{ $row->startPoint->name }}</a></td>
                                    <td><a >{{ $row->endPoint->name }}</a></td>
                                    <td><a >{{ $row->stop_points }}</a></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#form_route{{ $row->id }}" class="btn btn-primary">Edit</a>

                                        <a href="{{ route('route.delete' , $row->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>

                               @endforeach

                                </tbody>
                            </table>

                            {{ $data->links("pagination::bootstrap-4") }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($data as $key => $row)
        <div class="modal fade" id="form_route{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> New Route  </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  class="form-horizontal" action="{{ route('route.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label> Title </label>
                                <input hidden type="text" class="form-control" name="id" value="{{ $row->id }}" required  >
                                <input type="text" class="form-control" name="name" value="{{ $row->name }}" required  >
                            </div>

                            @php $stations = DB::table('stations')->get(); @endphp

                            <div class="form-group">
                                <label> Start Point </label>
                                <select class="form-control start_point_select" name="start_point">
                                    <option class="form-control" selected disabled="" >Select option</option>

                                    @foreach($stations as $key => $station)
                                        <option @if($station->name == $row->startPoint->name) selected @endif class="form-control" value="{{ $station->id }}" >{{ $station->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label> End Point </label>
                                <select class="form-control end_point_select" name="end_point">
                                    <option class="form-control" selected disabled="" >Select option</option>

                                    @foreach($stations as $key => $station)
                                        <option @if($station->name == $row->endPoint->name) selected @endif class="form-control" value="{{ $station->id }}" >{{ $station->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Stop Points </label>
                                <input id="stop_points" readonly type="text" class="form-control" name="stop_points" value="{{ $row->stop_points }}" required >

                                <br>

                                <ul class="stop_list" style="list-style-type: none;height:100px;overflow-y: auto;">

                                </ul>

                            </div>

                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


@endsection
