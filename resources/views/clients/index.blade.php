@extends('layouts.app')


@section('content')

@section('page_title')
    Governorates
@endsection()


<!-- Main content -->
<section class="content">

    @include('partials.validation_errors')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                           Live Search
                           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </h3>
                    </div>
                @if(count($records))
                    <!-- /.card-header -->
                    <div class="table-responsive ">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>City</th>
                                <th> Last Donation Date </th>
                                <th> active or de-active </th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$record->name}}</td>
                                <td>{{$record->email}}</td>
                                <td>{{$record->phone}}</td>
                                <td>{{$record->City_id->name}}</td>
                                <td>{{$record->last_donation_date}}</td>
                                  
                                <td>
                                    <form action={{url('client/status/'.$record->id)}} method="get">
                                        @csrf
                                       @if ($record->is_active==0)
                                       <button type="submit" class="btn btn-danger btn-sm float-left">Not Active</button>
                            
                                       @endif
                                       @if ($record->is_active==1)
                                       <button type="submit" class="btn btn-success btn-sm float-left">Active</button>
                            
                                       @endif
                                        {{-- <button type="submit" class="btn btn-{{$}} btn-sm float-left">De-Active</button> --}}
                                    </form>

                                </td>
                                
                                <td>
                                    <form action={{url('client/'.$record->id)}} method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-left">Delete</button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->

                </div>
                <div class="d-flex justify-content-center">
                    {{$records->links()}}
                </div>

                <!-- /.card -->
            </div>

        </div>
        @else
            <div class="row">
                <div class="col-11 m-3 px-3">
                    <div class="alert alert-info">
                        There's no users
                    </div>
                </div>
            </div>
        @endif





</section>
<!-- /.content -->
@endsection
