@extends('layouts.app')

@section('content')
@section('page_title')
Create Governorate
@endsection

@section('tap_title')
Governorates
@endsection
@include('partials.validation_errors')
<div class="col-6    ml-4">


@include('flash::message')

{{-- {!!  Form::model($model, ['route' => ['']]) !!}
    <div class="form-group">
        <label for="name">Name</label>
      {!!  Form::text('name',null,['class'=>'form-control'])!!}
      
      <button type="button" class="btn btn-primary btn-lg m-auto ">Block level button</button>
    </div>
{!! Form::close() !!} --}}
{{Form::open(array('url' => 'foo/bar', 'method' => 'put'))}}


<form action="{{url( route('governorate.update', ['governorate' => $governorate->id]) )}}" method="put" enctype="multipart-data">
    {{csrf_field()}}
   <div class="form-group">
        <label >Old Gov Name</label>
        <input type="text"  class="form-control" value="{{$governorate->name}}"  disabled>
        <label for="name">New Gov Name</label>
        <input type="text" name="name" class="form-control" placeholder="New Governorate Name...">
   
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
 </form>
</div>
@endsection