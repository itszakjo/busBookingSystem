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
                                    <th> Route</th>
                                    <th> Date</th>
                                    <th> Departure at</th>
                                    <th> Arrival at</th>
                                    <th> Seat price</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td> {{ $data->firstItem() + $key }} </td>
                                    <td><a >{{ $row->name }}</a></td>
                                    <td><a >{{ $row->Route->name }}</a></td>
                                    <td><a >{{ $row->date }}</a></td>
                                    <td><a >{{ $row->departure_at }}</a></td>
                                    <td><a >{{ $row->arrival_at }}</a></td>
                                    <td><a >{{ $row->seat_price }}</a></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#form_trip{{ $row->id }}" class="btn btn-primary">Edit</a>

                                        <a href="{{ route('trip.delete' , $row->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
        <div class="modal fade" id="form_trip{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> Edit Trip  </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form  class="form-horizontal" action="{{ route('trip.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label> Name </label>
                                <input hidden type="text" class="form-control" name="id" value="{{ $row->id }}" required  >
                                <input type="text" class="form-control" name="name" value="{{ $row->name }}" required  >
                            </div>

                            @php $routes = DB::table('routes')->get(); @endphp

                            <div class="form-group">
                                <label> Routes </label>
                                <select class="form-control" name="route" required>

                                    <option class="form-control" selected disabled="" >Select option</option>

                                    @foreach($routes as $key => $route)
                                        <option class="form-control" @if($route->id == $row->route) selected @endif value="{{ $route->id }}" >{{ $route->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group">
                                <label> Date </label>
                                <input type="date" class="form-control" name="date" value="{{ $row->date }}" required >
                            </div>

                            <div class="form-group">
                                <label> Departure at </label>
                                <input type="time" class="form-control" name="departure_at" value="{{ $row->departure_at }}" required >
                            </div>

                            <div class="form-group">
                                <label> Arrival at </label>
                                <input type="time" class="form-control" name="arrival_at" value="{{ $row->arrival_at }}" required >
                            </div>

                            <div class="form-group">
                                <label> Seat Price </label>
                                <input id="seat_price" oninput="this.value = Math.abs(this.value)" type="number" value="{{ $row->seat_price }}" class="form-control" name="seat_price"  min="0" required >
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
