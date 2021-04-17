@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Bookings</div>

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
                                    <th> Trip</th>
                                    <th> Pickup Point</th>
                                    <th> Drop Point</th>
                                    <th> Seats</th>
                                    <th> Booked at</th>
                                    <th> Total Price</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach ($data as $key=> $row)
                                <tr>
                                    <td> {{ $data->firstItem() + $key }} </td>
                                    <td><a >{{ $row->name }}</a></td>
                                    <td><a >{{ $row->Trip->name }}</a></td>
                                    <td><a >{{ $row->pickupPoint->name }}</a></td>
                                    <td><a >{{ $row->dropPoint->name }}</a></td>
                                    <td><a >{{ $row->seats }}</a></td>
                                    <td><a >{{ $row->booking_date }}</a></td>
                                    <td><a >{{ $row->total_price }}</a></td>
                                    <td>
                                        <a href="{{ route('booking.delete' , $row->id) }}" class="btn btn-danger btn-sm">Delete</a>
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



@endsection
