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
                            <a href="{{url("governorate/create")}}" class="btn btn-block btn-primary">
                                <span class="fa fa-1x fa-plus">Add governorate</span>
                            </a>
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
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$record->name}}</td>
                                <td>
                                    <a href="{{url('governorate/'.$record->id.'/edit')}}" class="btn btn-success float-left mr-2">
                                        <span class="fa fa-info-circle fa-1x"> Edit</span>
                                    </a>
                                </td>
                                <td>
                                    <form action={{url('governorate/'.$record->id)}} method="POST">
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
                        There's no governorate
                    </div>
                </div>
            </div>
        @endif





</section>
<!-- /.content -->
@endsection

