@extends('layouts.app')
@inject('model', 'App\Models\Governorate')
@section('content')
@section('page_title')
Create City
@endsection

@section('tap_title')
Cities
@endsection
<div class="col-6 ml-4">
@include('partials.validation_errors')


{{-- {!!  Form::model($model, ['route' => ['']]) !!}
    <div class="form-group">
        <label for="name">Name</label>
      {!!  Form::text('name',null,['class'=>'form-control'])!!}
      
      <button type="button" class="btn btn-primary btn-lg m-auto ">Block level button</button>
    </div>
{!! Form::close() !!} --}}


<form action="{{route('city.store')}}" method="POST" enctype="multipart-data">
    {{csrf_field()}}
   <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="City Name...">
    </div>
    <div class="form-group">
        <label>Governorate</label>
        <select id="inputState" name="governorate_id" class="form-control">
            <option selected>Choose governorate</option>
            @foreach($model::all() as $g)
                <option value="{{$g->id}}">{{$g->name}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
 </form>
</div>
@endsection