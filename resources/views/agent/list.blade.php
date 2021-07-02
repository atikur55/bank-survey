@extends('layout.master')
@section('title')
All List
@endsection
@section('list')
active
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Assign Table</li>
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
            View Assign
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
        @if(session('failed'))
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">Sorry!</h4>
          <p>{{session('failed')}}</p>
          <hr>
          <p class="mb-0">After Create File by Admin Than You Access It</p>
        </div>
        @endif
         @if(session('failed_bank'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{session('failed_bank')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(session('cs_pafailed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{session('cs_pafailed')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(session('cs_gurfailed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{session('cs_gurfailed')}}</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if(session('cs_banfailed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>{{session('cs_banfailed')}}</strong>
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
                <th>Name</th>
                <th>File Name</th>
                <th>File Type</th>
                <th>Zone</th>
                <th>Area</th>
                <th>Task</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($get_assign_list as $assign)
            <tr style="{{$assign->notification == 0 ? 'background: #FBFCBD;':''}}">
              <td>{{$i}}</td>
              <td>{{$assign->connect_users->name ?? ''}}</td>
              <td>{{$assign->filename}}</td>
              <td>
                @if($assign->file_type == 1)
                <span class="badge badge-danger">CA</span>
                @else
                <span class="badge badge-dark">CS</span>
                @endif
              </td>
              <td>{{$assign->connect_select_zones->zone_name??''}}</td>
              <td>{{$assign->connect_zones->zone_area??''}}</td>
              <td>{{$assign->task}}</td>
              <td>{{$assign->date}}</td>
              <td>
                <a style="color: #000;" href="{{url('update_assign_file')}}/{{$assign->id}}"><i data-feather="edit"></i></a>
                
                <!-- <a style="color: #000;" href="{{url('delete_assign')}}/{{$assign->id}}"><i data-feather="trash"></i></a> -->
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
