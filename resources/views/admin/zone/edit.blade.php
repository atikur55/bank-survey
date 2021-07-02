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
        <h4 class="card-title">Edit Zone</h4>
      </div>
      <div class="card-body">
        <form action="{{url('edit_zone_post')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>Zone Select</label>
              <input type="hidden" name="id" value="{{$zone->id}}">
              <select name="zone_number" class="form-control">
              	<option value="">-- Select Zone --</option>
              	<option value="zone-1" {{$zone->zone_number=='zone-1' ? 'selected':''}}>Zone-1</option>
              	<option value="zone-2" {{$zone->zone_number=='zone-2' ? 'selected':''}}>Zone-2</option>
              	<option value="zone-3" {{$zone->zone_number=='zone-3' ? 'selected':''}}>Zone-3</option>
              	<option value="zone-4" {{$zone->zone_number=='zone-4' ? 'selected':''}}>Zone-4</option>
              	<option value="zone-5" {{$zone->zone_number=='zone-5' ? 'selected':''}}>Zone-5</option>
              </select>
              @error('zone_number')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>

            <div class="form-group">
              <label>Area</label>
              <input type="text" name="zone_area" class="form-control" value="{{$zone->zone_area}}">
              @error('zone_area')
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