@extends('layout.master')
@section('title')
Assign Add
@endsection
@section('Item')
active
@endsection
@section('style_script')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
@endsection
@push('plugin-styles')
  <link href="{{ asset('assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
@endpush
@section('content')

<div class="row">
  <div class="col-lg-12 stretch-card">
    <div class="card">
      @if(session('message'))
      <!-- <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{session('message')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
 -->     
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>{{session('message')}}</p>
        <hr>
        <p class="mb-0">Back and Go to File Create icon Than You Set Your File Name.</p>
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
                  <form action="{{url('assign_post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label>Agent Name</label>
                      <!-- <input type="text" name="agent_name" class="form-control" id="exampleInputUsername1" autocomplete="off" placeholder="Agent Name"> -->
                      <select name="agent_name" id="nameid" class="form-control">
                        <option>-- Select --</option>
                        @foreach($agents as $agent)
                        <option value="{{$agent->id}}">{{$agent->name}}</option>
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
                      <input type="checkbox" name="file_type" class="file_type" id="file_type" value="1">&nbsp; CA
                      <input style="margin-left: 30px;" type="checkbox" name="file_type" class="file_type" id="file_type" value="2">&nbsp; CS
                      @error('file_type')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <!-- <div class="form-group">
                      <label for="exampleInputUsername1">Zone</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="zone" autocomplete="off" placeholder="Zone">
                      @error('zone')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div> -->
                    <div class="form-group">
                      <label for="exampleInputUsername1">Zone</label><br>
                      <select name="zone" class="form-control" id="zone_list">
                        <option value="">-- Select Zone--</option>
                        @foreach($zones as $zone)
                          <option value="{{$zone->id}}">{{$zone->zone_name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <!-- Add Area -->
                    <div class="form-group">
                      <label for="exampleInputUsername1">Area</label><br>
                      <select name="area_id" class="form-control" id="area_list">
                        <option value="">-- Select Area--</option>
                      </select>
                    </div>
                    <!-- End Area -->


                    <div class="form-group">
                      <label for="exampleInputUsername1">File Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" name="filename" autocomplete="off" placeholder="File Name">
                      @error('filename')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Task</label><br>
                  <input type="checkbox" name="task[]" value="Personal Details">&nbsp;&nbsp;Personal Details
                  <input type="checkbox" name="task[]" value="Bussiness Details">&nbsp;&nbsp;Bussiness Details
                  <input type="checkbox" name="task[]" value="Gurantor Details">&nbsp;&nbsp;Gurantor Details [ * CS ]
                  <input type="checkbox" name="task[]" value="Varification Details">&nbsp;&nbsp;Varification Details
                      @error('task')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Date</label>
                      <input type="date" class="form-control" id="exampleInputUsername1" name="date" autocomplete="off" placeholder="File Name">
                      @error('date')
                      <div class="alert alert-danger">
                        <strong>{{$message}}</strong>
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">SLA Date</label>
                      <input type="date" class="form-control" id="exampleInputUsername1" name="sla_date" autocomplete="off" >
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
                        <option value="instation">Instation</option>
                        <option value="outstation">Outstation</option>
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
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
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
<script type="text/javascript">
  $(".file_type").change(function()
  {
      $(".file_type").prop('checked',false);
      $(this).prop('checked',true);
  });
</script>
<script>
    $(document).ready(function(){
        $('#zone_list').change(function(){
            var zone_id = $(this).val();
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'GET',
                url: 'get/area',
                data:{zone_id:zone_id},
                success:function(data){
                    $('#area_list').html(data);
                }
            });


        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>



<script type="text/javascript">
  
  $(document).ready(function() { 
    $("#nameid").select2({
      placeholder:"search here",
      allowClear:true,
    }); 
  });
</script>
@endsection
