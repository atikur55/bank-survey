@extends('layout.master')
@section('assign_survey')
active
@endsection
@section('title')
All Assign List
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
            View Zone
          </div>
          <div class="col-lg-5" style="text-align:end;">
            <a style="color: #000;" href="{{url('add_assign')}}"><i data-feather="plus-square"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                <th>SL No</th>
                <th>Zone Number</th>
                <th>Area Name</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($all_zone as $zone)
            <tr>
              <td>{{$i}}</td>
              <td>{{$zone->connect_to_select_zone->zone_name}}</td>
              <td>{{$zone->zone_area}}</td>
              <td>
                 <a href="{{url('active_zone')}}/{{$zone->id}}" class="btn @php echo $zone->status == 0?'bg-maroon':'bg-blue'@endphp">
                  @php
                  echo $zone->status == 0?'Off&nbsp&nbsp&nbsp<i data-feather="toggle-left"></i>':'On&nbsp&nbsp&nbsp<i data-feather="toggle-right"></i>'
                  @endphp
                </a>
              </td>
              <td>
                <a style="color: #000;" href="{{url('edit_zone')}}/{{$zone->id}}"><i data-feather="edit"></i></a>
                <a style="color: #000;" href="{{url('delete_zone')}}/{{$zone->id}}"><i data-feather="trash"></i></a>
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
