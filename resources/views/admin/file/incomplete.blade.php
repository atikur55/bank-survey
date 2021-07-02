@extends('layout.master')
@section('title')
All Complete Files
@endsection
@section('complete_files')
active
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/home')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Incomplete Files</li>
  </ol>
</nav>

<div class="row">
  @if(session('delete'))
  <div class="alert alert-success">
    <strong>{{session('delete')}}</strong>
  </div>
  @endif
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-7">
            View Incomplete Files
          </div>
          <div class="col-lg-5" style="text-align:end;">
            <a style="color: #000;" href="{{url('home')}}"><i data-feather="arrow-left-circle"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('message')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif

        <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                <th>SL No</th>
                <th>File Name</th>
                <th>Created_at</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($incomplete_files as $incomplete)
            <tr>
              <td>{{$i}}</td>
              <td>{{$incomplete->filename}}</td>
              <td>{{$incomplete->created_at->format('d/m/y h:i:s A')}}</td>
              <td><span class="badge badge-danger">Incomplete</span></td>
              <td>
                <a style="color: #000;" href=""><i data-feather="edit"></i></a>               
              </td>
            </tr>
            @php $i++; @endphp
            @endforeach
            </tbody>
          </table>
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
