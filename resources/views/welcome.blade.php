@extends('layouts.app')
@inject('client', 'App\Models\Client')
@inject('donation', 'App\Models\Donation')
@inject('post', 'App\Models\Post')


    


@section('content')
  <!-- Content Header (Page header) -->
  
  @section('page_title')
  Dashboard
  @endsection
  <!-- Main content -->
  

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Blood Bank Dashboard </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        Welcomme to your Dashboard
      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        let's try
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    <div class="row p-2">
    <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$client->count()}}</h3>
            <p>Client Registrations</p>
          </div>
          <div class="icon">
            <i class="fas fa-user-circle"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{$post->count()}}</h3>

            <p>Posts</p>
          </div>
          <div class="icon">
            <i class="fas fa-question-circle"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>{{$donation->count()}}</h3>

            <p>Donations</p>
          </div>
          <div class="icon">
            <i class="fas fa-hand-holding-heart"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>

  <!-- /.content -->

@endsection
