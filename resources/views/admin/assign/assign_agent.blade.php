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
  @if(session('msg'))
  <div class="alert alert-success">
    <strong>{{session('msg')}}</strong>
  </div>
  @endif
  @if(session('failed'))
  <div class="alert alert-success">
    <strong>{{session('failed')}}</strong>
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

            <!-- Update V1 Survey -->
            {{-- <form action="{{ url('import-file') }}" method="POST" name="importform" enctype="multipart/form-data">
              @csrf
              <input type="file" name="import_file" class="form-control">
              <button style="margin-top: 4px;" type="submit" class="btn btn-success">Import</button>
            </form> --}}
            <!-- End Update V1 Survey -->

            <a style="color: #000;padding-right: 20px;" href="{{ route('export') }}"><i data-feather="download"></i> CSV</a>
            <a style="color: #000;" href="{{url('add_assign')}}"><i data-feather="plus-square"></i></a>
          </div>
        </div>
      </div>
      <div class="card-body">
        @if (Auth::user()->role==1)
          <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                <th>SL No</th>
                <th>Name</th>
                <th>File Name</th>
                <th>Create File</th>
                <th>Zone</th>
                <th>Area</th>
                <th>Task</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Task</th>
                <th>File Type</th>
                <th>Action</th>
                
                <th>Report</th>
                <!-- Extra Feature -->
                <th>File Status</th>
                <!-- End Extra Feature -->
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($all_assign as $assign)
            <tr>
              <td>{{$i}}</td>
              <td>{{$assign->connect_users->name}}</td>
              <td>{{$assign->filename}}</td>
              <td>
                <a style="color: #000;" href="{{url('view_cs_ca')}}/{{$assign->id}}"><i data-feather="file-plus"></i></a>
              </td>
              <td>{{$assign->connect_select_zones->zone_name??''}}</td>
              <td>{{$assign->connect_zones->zone_area??''}}</td>
              <td>{{$assign->task}}</td>
              <td>{{$assign->date}}</td>
              <td>{{$assign->created_at->format('h:i:s A')}}</td>
              <td>
                @php
                echo $assign->status == 1?'<p style="background-color: #3c9893;color: #fff;border-radius: 33px;text-align: revert;">Active</p>':'<p style="background-color: #3c9893;color: #fff;border-radius: 33px;text-align: revert;">Deactive</p>'
                @endphp
              </td>
              <td>
                @if($assign->task_status == 0)
                <a href="{{url('active_task')}}/{{$assign->id}}"><span class="badge badge-danger">Incomplete</span></a>
                @else
                <a href="{{url('active_task')}}/{{$assign->id}}"><span class="badge badge-success">Complete</span></a>
                @endif
              </td>
              <td>
                @if($assign->file_type == 1)
                <span class="badge badge-danger">CA</span>
                @else
                <span class="badge badge-dark">CS</span>
                @endif
              </td>
              <td>
                <a style="color: #000;" href="{{url('edit_assign')}}/{{$assign->id}}"><i data-feather="edit"></i></a>
                <a style="color: #000;" href="{{url('delete_assign')}}/{{$assign->id}}"><i data-feather="trash"></i></a>
                
              </td>
             
              <td>
                <a style="color: #000;" href="{{url('show_report')}}/{{$assign->id}}">show report </a>
                <a style="color: #000;" href="{{url('report')}}/{{$assign->id}}"><i data-feather="eye"></i> </a>
                <a style="color: #000;" href="{{url('download')}}/{{$assign->id}}"><i data-feather="download"></i></a>
              </td>
              <!-- Extra Feature -->
              <td>
                <a style="color: #000;" class="badge badge-success" href="{{url('update_assign_file')}}/{{$assign->id}}">show</a>
              </td>
              <!-- Extra Feature -->
            </tr>
            @php $i++; @endphp
            @endforeach
            </tbody>
          </table>
        </div>
        @else
        <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                <th>SL No</th>
                <th>Name</th>
                <th>File Name</th>
                <th>Zone</th>
                <th>Area</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Task</th>
                <th>File Type</th>
                <th>Report</th>
                <!-- Extra Feature -->
               
                <!-- End Extra Feature -->
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($all_assign as $assign)
            <tr>
              <td>{{$i}}</td>
              <td>{{$assign->connect_users->name}}</td>
              <td>{{$assign->filename}}</td>
              <td>{{$assign->connect_select_zones->zone_name??''}}</td>
              <td>{{$assign->connect_zones->zone_area??''}}</td>
              <td>{{$assign->task}}</td>
              <td>{{$assign->date}}</td>
              <td>{{$assign->created_at->format('h:i:s A')}}</td>
              <td>
                @php
                echo $assign->status == 1?'<p style="background-color: #3c9893;color: #fff;border-radius: 33px;text-align: revert;">Active</p>':'<p style="background-color: #3c9893;color: #fff;border-radius: 33px;text-align: revert;">Deactive</p>'
                @endphp
              </td>
              
              <td>
                @if($assign->file_type == 1)
                <span class="badge badge-danger">CA</span>
                @else
                <span class="badge badge-dark">CS</span>
                @endif
              </td>
              
              
              <td>
                {{-- <a style="color: #000;" href="{{url('report')}}/{{$assign->id}}"><i data-feather="eye"></i> </a> --}}
                <a style="color: #000;" href="{{url('show_report')}}/{{$assign->id}}"><i data-feather="eye"></i></a>
                <a style="color: #000;" href="{{url('download')}}/{{$assign->id}}"><i data-feather="download"></i></a>
              </td>
             
            </tr>
            @php $i++; @endphp
            @endforeach
            </tbody>
          </table>
        </div>
        @endif
        {{-- <div class="table-responsive">
          <table id="dataTableExample" class="table table-striped text-center">
            <thead>
              <tr>
                <th>SL No</th>
                <th>Name</th>
                <th>File Name</th>
                <th>Zone</th>
                <th>Area</th>
                <th>Task</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Task</th>
                <th>File Type</th>
                <th>Action</th>
                <th>Create File</th>
                <th>Report</th>
                <!-- Extra Feature -->
                <th>File Status</th>
                <!-- End Extra Feature -->
              </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($all_assign as $assign)
            <tr>
              <td>{{$i}}</td>
              <td>{{$assign->connect_users->name}}</td>
              <td>{{$assign->filename}}</td>
              <td>{{$assign->connect_select_zones->zone_name??''}}</td>
              <td>{{$assign->connect_zones->zone_area??''}}</td>
              <td>{{$assign->task}}</td>
              <td>{{$assign->date}}</td>
              <td>{{$assign->created_at->format('h:i:s A')}}</td>
              <td>
                @php
                echo $assign->status == 1?'<p style="background-color: #3c9893;color: #fff;border-radius: 33px;text-align: revert;">Active</p>':'<p style="background-color: #3c9893;color: #fff;border-radius: 33px;text-align: revert;">Deactive</p>'
                @endphp
              </td>
              <td>
                @if($assign->task_status == 0)
                <a href="{{url('active_task')}}/{{$assign->id}}"><span class="badge badge-danger">Incomplete</span></a>
                @else
                <a href="{{url('active_task')}}/{{$assign->id}}"><span class="badge badge-success">Complete</span></a>
                @endif
              </td>
              <td>
                @if($assign->file_type == 1)
                <span class="badge badge-danger">CA</span>
                @else
                <span class="badge badge-dark">CS</span>
                @endif
              </td>
              <td>
                <a style="color: #000;" href="{{url('edit_assign')}}/{{$assign->id}}"><i data-feather="edit"></i></a>
                <a style="color: #000;" href="{{url('delete_assign')}}/{{$assign->id}}"><i data-feather="trash"></i></a>
                
              </td>
              <td>
                <a style="color: #000;" href="{{url('view_cs_ca')}}/{{$assign->id}}"><i data-feather="file-plus"></i></a>
              </td>
              <td>
                <a style="color: #000;" href="{{url('report')}}/{{$assign->id}}"><i data-feather="eye"></i> </a>
                <a style="color: #000;" href="{{url('download')}}/{{$assign->id}}"><i data-feather="download"></i></a>
              </td>
              <!-- Extra Feature -->
              <td>
                <a style="color: #000;" class="badge badge-success" href="{{url('update_assign_file')}}/{{$assign->id}}">show</a>
              </td>
              <!-- Extra Feature -->
            </tr>
            @php $i++; @endphp
            @endforeach
            </tbody>
          </table>
        </div> --}}
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
