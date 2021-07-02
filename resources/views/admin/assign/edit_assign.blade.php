@extends('layout.master')
@section('title')
Edit Assign 
@endsection
@section('Item')
active
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush
@section('content')

<div class="row">
  <div class="col-lg-12 stretch-card">
    <div class="card">
      @if(session('message'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif
      <div class="card-header">
        <div class="row">
          <div class="col-lg-7">
            Add Assign 
          </div>
          <div class="col-lg-5" style="text-align:end;">
            <a href="{{url('assign_survey')}}"><i data-feather="arrow-left-circle"></i></a>
          </div>
        </div>
      </div>
            <div class="card-body">
                <div class="col-lg-7 m-auto">
                  <form action="{{url('edit_assign_post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputUsername1">Agent Name</label>
                      <input type="hidden" name="id" value="{{$get_assign->id}}">
                      <select name="agent_name" class="form-control">
                        <option>-- Select --</option>
                        @foreach($agents as $agent)
                        <option value="{{$agent->id}}" {{$get_assign->agent_name == $agent->id? 'selected':''}}>{{$agent->name}}</option>
                        @endforeach
                         @error('agent_name')
                        <div class="alert alert-danger">
                          <strong>{{$message}}</strong>
                        </div>
                        @enderror
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">File Type</label><br>
                      <input type="checkbox" name="file_type" class="file_type" id="file_type" value="1" {{$get_assign->file_type == 1 ? 'checked' : ''}}>&nbsp; CA
                      <input style="margin-left: 30px;" type="checkbox" name="file_type" class="file_type" id="file_type" value="2" {{$get_assign->file_type == 2 ? 'checked' : ''}}>&nbsp; CS
                      @error('file_type')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">File Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="filename" autocomplete="off" value="{{$get_assign->filename}}">
                      @error('filename')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                     <div class="form-group">
                      <label for="exampleInputUsername1">Zone</label><br>
                      <select name="zone" class="form-control" id="zone_list">
                        <option value="">-- Select Zone--</option>
                        @foreach($zones as $zone)
                          <option value="{{$zone->id}}" {{$get_assign->zone == $zone->id? 'selected':''}}>{{$zone->zone_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Area</label><br>
                      <input type="text" class="form-control" name="area_id" value="{{$get_assign->connect_zones->zone_area??''}}">
                        
                    </div>
                   
                     <div class="form-group">
                      <label for="exampleInputUsername1">Task</label><br>

            <!-- <input type="checkbox" name="task[]" value="Personal Details" {{$checkbox_value[0]??'' == 'Personal Details' ? 'checked':''}}>&nbsp;&nbsp;Personal Details

            <input type="checkbox" name="task[]" value="Bussiness Details" {{$checkbox_value[1]??'' == 'Bussiness Details' ? 'checked':''}}>&nbsp;&nbsp;Bussiness Details

            <input type="checkbox" name="task[]" value="Gurantor Details" {{$checkbox_value[2]??'' == 'Gurantor Details' ? 'checked':''}}>&nbsp;&nbsp;Gurantor Details
            <input type="checkbox" name="task[]" value="Varification Details" {{$checkbox_value[3]??'' == 'Varification Details' ? 'checked':''}}>&nbsp;&nbsp;Varification Details --> 
            <input type="checkbox" name="task[]" value="Personal Details">&nbsp;&nbsp;Personal Details

            <input type="checkbox" name="task[]" value="Bussiness Details">&nbsp;&nbsp;Bussiness Details

            <input type="checkbox" name="task[]" value="Gurantor Details">&nbsp;&nbsp;Gurantor Details
            <input type="checkbox" name="task[]" value="Varification Details">&nbsp;&nbsp;Varification Details
                      @error('task')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="mb-2">
                      <span class="badge badge-success" style="font-size: 15px;">Selected File : {{$get_assign->task}}</span>
                      <!-- <p style="colo">Selected File : {{$get_assign->task}}</p> -->
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputUsername1">Date</label>
                      <input type="date" class="form-control" id="exampleInputUsername1" name="date" autocomplete="off" value="{{$get_assign->date}}">
                      @error('date')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">SLA Date</label>
                      <input type="date" class="form-control" id="exampleInputUsername1" name="sla_date" autocomplete="off" value="{{$get_assign->sla_date}}">
                      @error('sla_date')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Select Data</label>
                      <select class="form-control" name="inout_data">
                        <option value="">-- Choose --</option>
                        <option value="instation" {{$get_assign->inout_data == 'instation' ? 'selected':''}}>Instation</option>
                        <option value="outstation" {{$get_assign->inout_data == 'outstation' ? 'selected':''}}>Outstation</option>
                      </select>
                      @error('inout_data')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Status</label>
                      <select class="form-control" name="status">
                        <option value="">-- Choose --</option>
                        <option value="1" {{$get_assign->status == 1 ? 'selected':''}}>Active</option>
                        <option value="0" {{$get_assign->status == 0 ? 'selected':''}}>Deactive</option>
                      </select>
                      @error('status')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </div>
                  </form>
                </div>
            </div>
          </div>
        </div>

      </div>
   


@endsection

@push('plugin-scripts')
  <script src="{{ asset('assets/plugins/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
  <script src="{{ asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
  <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/plugins/progressbar-js/progressbar.min.js') }}"></script>
@endpush

@push('custom-scripts')
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>
  <script src="{{ asset('assets/js/datepicker.js') }}"></script>
@endpush
@section('js_script')
<!-- For Office Address -->
        <script type="text/javascript">
            $(".file_type").change(function () {
                $(".file_type").prop('checked', false);
                $(this).prop('checked', true);
            });
        </script>
@endsection
