@extends('layout.master')
@section('title')
Create Zone
@endsection
@section('zone')
active
@endsection
@section('content')
  <div class="col-lg-6 m-auto">
    <div class="card">
      @if(session('success'))
      	<div class="alert alert-success alert-dismissible fade show" role="alert">
		  <strong>{{session('success')}}</strong>
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
      @endif
      <div class="card-header">
        <h4 class="card-title">Add Zone</h4>
      </div>
      <div class="card-body">
        <form action="{{url('create_zone_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Zone</label>
              <input type="text" name="zone_name" class="form-control" placeholder="Zone">
              @error('zone_name')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
          
            <div class="form-group">
              <button style="background-color: #332544;border: none;" type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
      </div>
    </div>
  </div>
@endsection