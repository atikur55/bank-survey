@extends('layout.master')
@section('title')
Essential-infotech- Add Category
@endsection
@section('content')
<div class="row">
  <div class="col-lg-12 m-auto">
    <div class="card">
      @if(session('edit_success'))
      <strong class="alert alert-success">{{session('edit_success')}}</strong>
      @endif
      <div class="card-header">
        <div class="row">
          <div class="col-lg-7">
            <h4 class="card-title">Edit App Info</h4>
          </div>
          <div class="col-lg-5" style="text-align: end;">
            <a href="{{url('appinfo')}}" style="color: #000;"><i data-feather="arrow-left-circle"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="col-lg-6 m-auto">
          <form action="{{url('editinfopost')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>App Name</label>
              <input type="text" name="app_name" class="form-control" value="{{$get_app->app_name}}">
              <input type="hidden" name="id" class="form-control" value="{{$get_app->id}}">
              @error('app_name')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <label>Status</label><br>
              <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="1" {{($get_app->status == 1)? 'checked':''}}>&nbsp&nbsp&nbspOn
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" value="0" {{($get_app->status == 0)? 'checked':''}}>&nbsp&nbsp&nbspOff
                  </div>
                  @error('status')
                  <strong class="text-danger">{{$message}}</strong>
                  @enderror
            </div>
            <div>
              <img src="{{asset('uploads/applogo/')}}/{{$get_app->app_logo}}" width="200px">
            </div>
            <div class="form-group">
              <label>App Logo</label>
              <input type="file" class="form-control" name="app_logo" value="{{old('app_logo')}}">
              @error('app_logo')
              <div class="alert alert-danger">
                <small>{{$message}}</small>
              </div>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection