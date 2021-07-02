@extends('layout.master')
@section('zone')
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
    <li class="breadcrumb-item active" aria-current="page">Assign File</li>
  </ol>
</nav>

<div class="row">
  @if(session('delete'))
  <div class="alert alert-success">
    <strong>{{session('delete')}}</strong>
  </div>
  @endif
  @if(session('success'))
  <div class="alert alert-success">
    <strong>{{session('success')}}</strong>
  </div>
  @endif
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-lg-8">
            View File
          </div>
          <div class="col-lg-4" style="text-align:end;">
            <!-- <a style="color: #000;padding-right: 20px;" href="{{ route('export') }}"><i data-feather="download"></i> CSV</a> -->
            <form action="{{ url('import-excel_ca_post') }}" method="POST" name="importform" enctype="multipart/form-data">
              @csrf
              <input type="file" name="import_file" class="form-control">
              <button style="margin-top: 4px;" type="submit" class="btn btn-success">Import</button>
            </form>
            <!-- <a style="color: #000;" href="{{url('add_assign')}}"><i data-feather="plus-square"></i></a> -->
          </div>
        </div>
      </div>
      <div class="card-body">

        <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                <th>SL No</th>
                <th>File Name</th>
                <th>Name</th>
                <th>Receiving Date</th>
                <th>Submission Date</th>
                <th>Task</th>
                <th>Phone</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($all_file as $file)
            <tr>
              <td>{{$i}}</td>
              <td>{{$file->filename}}</td>
              <td>{{$file->agent_name}}</td>
              <td>{{$file->receving_date}}</td>
              <td>{{$file->submission_date}}</td>
              <td>{{$file->task}}</td>
              <td>{{$file->phone}}</td>
              <td>
                <a style="color: #000;" href="{{url('delete_file_ca')}}/{{$file->id}}"><i data-feather="trash"></i></a>
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
