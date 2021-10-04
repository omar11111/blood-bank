@extends('layouts.app')
@inject('model', 'App\Models\Governorate')
@section('content')
@section('page_title')
Create Category
@endsection

@section('tap_title')
Governorates
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


<form action="{{route('category.store')}}" method="POST" enctype="multipart-data">
    {{csrf_field()}}
   <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" placeholder="Category Name...">
    </div>
    <button type="submit" class="btn btn-info">Submit</button>
 </form>
</div>
@endsection