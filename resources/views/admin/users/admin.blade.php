@extends('layout.master')
@section('title')
All Admin
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/datatables-net/dataTables.bootstrap4.css') }}" rel="stylesheet" />
@endpush


@section('content')
<nav class="page-breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Admin Table</li>
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
            View Admin
          </div>
          <div class="col-lg-5" style="text-align:end;">
            <!-- <a href="{{url('add_user')}}"><i data-feather="user-plus"></i></a> -->
          </div>
        </div>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                  <th>SL NO</th>
                  <th>Admin Name</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
            </thead>
            <tbody>
              @php $i=1; @endphp
              @forelse($all_admin as $admin)
                <tr>
                  <td>{{$i}}</td>
                  <td>{{$admin->name}}</td>
                  <td>{{$admin->email}}</td>
                  <td>
                        @php
                        echo $admin->role == 0?'<span class="badge badge-dark">User</span>':'<span class="badge badge-success">Admin</span>'
                        @endphp
                  </td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{url('user_edit')}}/{{$admin->id}}" class="btn bg-blue"><i data-feather="edit"></i></a>
                        <a href="{{url('user_delete')}}/{{$admin->id}}" class="btn bg-marron"><i data-feather="delete"></i></a>
                    </div>
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

