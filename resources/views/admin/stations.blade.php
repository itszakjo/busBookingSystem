@extends('admin.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Stations</div>

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

                                </tr>
                                </thead>
                                <tbody>


                                @foreach ($data as $key=> $row)

                                <tr>
                                    <td> {{ $data->firstItem() + $key }} </td>
                                    <td><a >{{ $row->name }}</a></td>
                                    <td>
                                        <a href="#" data-toggle="modal" data-target="#form_station{{ $row->id }}" class="btn btn-primary">Edit</a>

                                        <a href="{{ route('station.delete' , $row->id) }}" class="btn btn-danger btn-sm">Delete</a>
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
        <div class="modal fade" id="form_station{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Station  </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form  class="form-horizontal" action="{{ route('station.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Name </label>
                            <input hidden type="text" class="form-control" name="id" value="{{ $row->id }}" required  >
                            <input type="text" class="form-control" name="name" value="{{ $row->name }}" required  >
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
