@extends('layout.master')
@section('title')
Client Enquiry Form
@endsection
@section('cef')
active
@endsection
@section('style_script')
<style type="text/css">
 .color input{
    border: 2px solid #228752;
    margin-bottom: 20px;
  }
  .color textarea{
    border: 2px solid #228752;
  }
  .color select{
    border: 2px solid #228752;
  }
  .button{
    margin-top: 30px;
  }
  .button button{
    padding: 8px 30px;
  }
</style>
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Client Enquiry Form</li>
  </ol>
</nav>

<div class="row">
  @if(session('success'))
  <div class="alert alert-success">
    <strong>{{session('success')}}</strong>
  </div>
  @endif
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center">Client Enquiry Form</h2>
          </div>
        </div>
      </div>
      <div class="card-body">
        <div class="col-lg-10 m-auto">
          <form action="{{url('sent_enquiry')}}" method="POST">
            @csrf
              <div class="form-row color">
                <div class="col">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control">
                  @error('name')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col">
                  <label>Website</label>
                  <input type="text" name="website" class="form-control">
                  @error('website')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="form-row color">
                <div class="col">
                  <label>Company</label>
                  <input type="text" name="company" class="form-control">
                  @error('company')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                  <label>Email</label>
                  <input type="text" name="email" class="form-control">
                  @error('email')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                  <label>Phone</label>
                  <input type="text" name="phone" class="form-control">
                  @error('phone')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col">
                  <label>Notes</label>
                  <textarea name="notes" class="form-control" cols="6" rows="13"></textarea>
                  @error('notes')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="form-row color">
                <div class="col">
                  <label>Address</label>
                  <textarea name="address" class="form-control" cols="6" rows="7"></textarea>
                  @error('address')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
                <div class="col">
                  <label>Meeting Date</label>
                  <input type="date" name="date" class="form-control">
                  @error('date')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                  <label>Priority</label>
                  <select name="priority" class="form-control">
                    <option value="High">High</option>
                    <option value="interested">Interested</option>
                  </select>
                  @error('priority')
                  <div class="alert alert-danger">{{$message}}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group text-center button">
                <button type="submit" class="btn btn-success">Create</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/datatables-net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('assets/plugins/datatables-net-bs4/dataTables.bootstrap4.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/data-table.js') }}"></script>
@endpush
