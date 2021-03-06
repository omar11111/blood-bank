@extends('layouts.app')

@section('content')

@section('page_title')
    Edit goveronrate
@endsection()


<!-- Main content -->
<section class="content">

    <div class="row justify-content-center">
        <div class="col-9 ">
            @include('partials.validation_errors')
            <div class="card card-primary">
                <div class="card-header bg-info">
                    <h3 class="card-title">Create governorate</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->

                <form action="{{url('governorate/'.$record->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="titleForPost">name</label>
                            <input type="text" value="{{$record->name}}" name="name" class="form-control" id="name" placeholder="Enter name for governorate">
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

                <!--  form end       -->
                {{--                @include('partials.form')--}}

            </div>
        </div>

    </div>









</section>
<!-- /.content -->
@endsection
