
@extends('layout.master2')

@section('content')
<div class="page-content d-flex align-items-center justify-content-center">

  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card">
        <div class="row">

          <div class="col-md-8 m-auto pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <div class="image" style="margin-left:80px;">
                @php
                    $get_logo = App\AppInfo::where('status',1)->first();
                @endphp
               <img src="{{asset('uploads/applogo/')}}/{{$get_logo->app_logo??''}}" width="80px;">
              </div>
              <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>
              <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  @csrf
                <div class="form-group">
                  <label for="exampleInputUsername1">Username</label>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">

                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputPassword1">Phone</label>
                  <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone" required>
                  @error('phone')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Address</label>
                  <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Address" required>
                  @error('address')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" required>
                  @error('image')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div> -->
                <div class="form-check form-check-flat form-check-primary">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Remember me
                  </label>
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary">
                      {{ __('Sign Up') }}
                  </button>
                </div>
                <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
