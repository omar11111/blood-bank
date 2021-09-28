@extends('layouts.app')

@section('content')
@section('page_title')
Governorates
@endsection

@section('tap_title')
Governorates
@endsection
<a class="btn btn-info ml-5 m-2 " href="{{url(route('governorate.create'))}}" role="button"><i class="fas fa-plus fa-sm mr-1"></i>New Governorate</a>
<table class="table col-11 m-auto ">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @if (count($recordes))
            @foreach ($recordes as $recorde)
            <tr>
                <th scope="row">{{$recorde->iteration}}</th>
                <td>{{$recorde->name}}</td>
                <td>edit</td>
                <td>delete</td></tr>
            
            @endforeach      
        @else
            <th scope="row">1</th>
            <td>no data</td>
            <td></td>
            <td></td>
        @endif
    </tbody>
  </table>

@endsection